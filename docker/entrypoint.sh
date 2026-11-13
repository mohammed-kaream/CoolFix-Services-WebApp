#!/bin/sh
# =============================================================================
# Container startup script
#   1. make sure an APP_KEY exists
#   2. prepare the database (SQLite file or wait for MySQL)
#   3. run migrations (+ demo seed data on first start)
#   4. hand over to Apache
# =============================================================================
set -e
cd /var/www/html

# --- 1. Application key -------------------------------------------------------
# If APP_KEY is not provided, generate one once and keep it in the storage
# volume so sessions survive container restarts.
KEY_FILE=storage/app/.app_key
if [ -z "$APP_KEY" ]; then
    if [ ! -s "$KEY_FILE" ]; then
        php artisan key:generate --show --no-ansi > "$KEY_FILE"
        echo "[entrypoint] Generated a new APP_KEY"
    fi
    APP_KEY="$(cat "$KEY_FILE")"
    export APP_KEY
fi

# --- 2. Database ----------------------------------------------------------------
if [ "$DB_CONNECTION" = "sqlite" ]; then
    mkdir -p "$(dirname "$DB_DATABASE")"
    [ -f "$DB_DATABASE" ] || touch "$DB_DATABASE"
    chown www-data:www-data "$DB_DATABASE" "$(dirname "$DB_DATABASE")"
else
    echo "[entrypoint] Waiting for $DB_CONNECTION at ${DB_HOST}:${DB_PORT:-3306} ..."
    tries=0
    until php -r '
        try {
            new PDO("mysql:host=".getenv("DB_HOST").";port=".(getenv("DB_PORT") ?: 3306),
                    getenv("DB_USERNAME"), getenv("DB_PASSWORD"));
            exit(0);
        } catch (Throwable $e) { exit(1); }'; do
        tries=$((tries + 1))
        if [ "$tries" -ge 30 ]; then
            echo "[entrypoint] Database is not reachable, giving up." >&2
            exit 1
        fi
        sleep 2
    done
    echo "[entrypoint] Database is ready."
fi

# --- 3. Migrations + demo data --------------------------------------------------
php artisan migrate --force --no-interaction

if [ "$SEED_DATABASE" = "true" ]; then
    USERS=$(php artisan tinker --execute='echo \App\Models\User::count();' 2>/dev/null | tail -n 1)
    if [ "$USERS" = "0" ]; then
        echo "[entrypoint] Empty database - seeding demo data"
        php artisan db:seed --force --no-interaction
    fi
fi

# Public link for uploaded files (avatars, etc.)
php artisan storage:link --force >/dev/null 2>&1 || true

# Cache compiled Blade views for faster responses
php artisan view:cache >/dev/null 2>&1 || true

# Files created by root above must stay writable by Apache
chown -R www-data:www-data storage bootstrap/cache

# --- 4. Start the web server ----------------------------------------------------
exec "$@"
