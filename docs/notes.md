# Technical Notes

## 1. The biggest Docker problem I faced — and how I solved it

**Problem: the image built successfully, but the container stayed `unhealthy` and both `/health` and the home page returned HTTP 500.**

`docker build` finished without errors and `docker ps` showed the container `Up`, but after the
start period Docker marked it **`(unhealthy)`**. Instead of guessing, I debugged it from inside Docker:

```powershell
docker ps --format "table {{.Names}}\t{{.Status}}"   # -> Up 2 minutes (unhealthy)
curl.exe -s -o NUL -w "%{http_code}" http://localhost:8000/health   # -> 500
docker logs coolfix-standalone 2>&1 | Select-String "local.ERROR"
```

The logs (Laravel writes to `stderr`, so `docker logs` shows them) revealed **two separate bugs**:

1. **`/health` → `Session store not set on request`.**
   I had removed the session middleware from the health route so that Docker's check (every 30 s)
   would not create a new session row each time. But in Laravel 13 the CSRF middleware
   (`PreventRequestForgery`) still runs for GET requests and tries to attach an `XSRF-TOKEN` cookie
   taken from the session — which no longer existed.
   **Fix:** register `/health` in `bootstrap/app.php` (`withRouting(then: ...)`) **outside the `web`
   middleware group**, so it has no session, cookies or CSRF at all — exactly what a health probe needs.

2. **`/index` → `Call to undefined method CoolController::home()`.**
   This bug already existed in the original project: the route pointed to a method that had been moved
   to `MainPageController`. On my local WAMP setup I always opened `/`, so I never noticed it.
   **Fix:** point `/index` to `MainPageController::home`.

After fixing the code, the container was *still* unhealthy — because I had only restarted the old
container. An image is a snapshot of the code at build time, so every code change needs
`docker build` again and a new container (`docker rm` + `docker run`). After rebuilding, the
container became `(healthy)`, `/health` returned `{"status":"ok","database":"ok"}` and `/index` returned 200.

**What I learned:** a container that is *running* is not the same as an application that *works*.
The `HEALTHCHECK` caught a problem that `docker run` alone would have hidden, and a clean, reproducible
environment exposed a bug my local machine was hiding.

**Other things handled in the Docker setup**

- **Database not ready yet:** with Compose, the app waits for MySQL using a `healthcheck` on the `db`
  service plus `depends_on: condition: service_healthy`, and `entrypoint.sh` also retries the
  connection before running migrations.
- **Windows line endings:** a CRLF shell script fails in Linux (`exec ... no such file or directory`),
  so `.gitattributes` forces LF for `*.sh` and the Dockerfile strips `\r` as a safety net.
- **Secrets & size:** `.dockerignore` keeps `.env`, `vendor/`, `node_modules/` and `.git/` out of the
  build context; the multi-stage build leaves Node.js and Composer out of the final image.
- **APP_KEY:** generated on first start and stored in a volume, so no secret is baked into the image.

## 2. The most important Git/GitHub lesson I learned

**Work on a feature branch and merge through a Pull Request — and never commit secrets.**

- My original project history had messages like `new new5`, which tell nobody what changed.
  Writing one small commit per logical step (`chore:`, `docker:`, `docs:`, `fix:`...) makes the
  history readable and lets me revert one change without touching the others.
- Developing the Compose / healthcheck / CI work on the `feature/docker-compose-ci` branch kept
  `main` stable. The Pull Request showed the full diff, triggered the CI build automatically,
  and only got merged after the checks passed.
- `.env` contains real API keys and passwords. Adding it to `.gitignore` *before* the first commit
  is essential — once a secret is pushed to GitHub it must be considered leaked, even if deleted later.
