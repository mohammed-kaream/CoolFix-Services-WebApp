# syntax=docker/dockerfile:1
# =============================================================================
# CoolFix Services WebApp - multi-stage Docker build
#   Stage 1 (assets) : build Tailwind/Vite front-end with Node
#   Stage 2 (vendor) : install PHP dependencies with Composer
#   Stage 3 (runtime): small PHP 8.4 + Apache image that only contains what
#                      the app needs to run (no Node, no Composer, no npm cache)
# =============================================================================

# ---------- Stage 1: front-end assets ----------
FROM node:25-alpine AS assets
WORKDIR /app

# Install JS dependencies first (better layer caching)
COPY package.json package-lock.json .npmrc ./
RUN npm ci --no-audit --no-fund

# Copy only what Vite/Tailwind need to build the CSS/JS bundle
COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
RUN npm run build


# ---------- Stage 2: PHP dependencies ----------
FROM composer:2 AS vendor
WORKDIR /app

COPY composer.json composer.lock ./
# Dev packages are kept because the database seeders use Faker for demo data
RUN composer install \
        --no-interaction --no-progress --prefer-dist \
        --no-scripts --no-autoloader --ignore-platform-reqs

COPY . .
RUN composer dump-autoload --optimize --no-scripts


# ---------- Stage 3: runtime ----------
FROM php:8.4-apache AS runtime

LABEL org.opencontainers.image.title="CoolFix Services WebApp" \
      org.opencontainers.image.description="Laravel home-services platform running on PHP 8.4 + Apache" \
      org.opencontainers.image.source="https://github.com/mohammed-kaream/CoolFix-Services-WebApp"

# PHP extensions needed by Laravel + MySQL (pdo_sqlite is already built in)
RUN docker-php-ext-install pdo_mysql opcache \
    && a2enmod rewrite headers

# Serve Laravel from /public and allow .htaccess rewrites
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY docker/php.ini /usr/local/etc/php/conf.d/zz-app.ini

WORKDIR /var/www/html

# Application code + artefacts from the build stages
COPY --chown=www-data:www-data . .
COPY --chown=www-data:www-data --from=vendor /app/vendor ./vendor
COPY --chown=www-data:www-data --from=assets /app/public/build ./public/build

# Writable folders for Laravel + register package service providers
RUN mkdir -p storage/framework/cache/data storage/framework/sessions \
             storage/framework/views storage/logs storage/app/public bootstrap/cache \
    && php artisan package:discover --ansi \
    && chown -R www-data:www-data storage bootstrap/cache database \
    && chmod -R ug+rwX storage bootstrap/cache database

# Startup script (strip Windows CRLF line endings just in case)
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN sed -i 's/\r$//' /usr/local/bin/entrypoint.sh && chmod +x /usr/local/bin/entrypoint.sh

# Sensible defaults so `docker run` works on its own (SQLite inside the container).
# docker-compose.yml overrides these to use the MySQL service instead.
ENV APP_NAME="CoolFix" \
    APP_ENV=local \
    APP_DEBUG=false \
    APP_URL=http://localhost:8000 \
    LOG_CHANNEL=stderr \
    DB_CONNECTION=sqlite \
    DB_DATABASE=/var/www/html/database/database.sqlite \
    SESSION_DRIVER=database \
    CACHE_STORE=database \
    QUEUE_CONNECTION=sync \
    MAIL_MAILER=log \
    DEBUGBAR_ENABLED=false \
    SEED_DATABASE=true

EXPOSE 80

# Docker marks the container healthy only when /health answers 200
HEALTHCHECK --interval=30s --timeout=5s --start-period=40s --retries=3 \
    CMD php -r 'exit(@file_get_contents("http://127.0.0.1/health") === false ? 1 : 0);'

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
