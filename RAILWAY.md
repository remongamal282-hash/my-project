# Railway Deploy (Laravel)

## 1) Push project to GitHub
Railway will deploy from your repository.

## 2) Create services in Railway
- Web Service: connect your GitHub repo (uses root `Dockerfile`).
- MySQL Service: add Railway MySQL.

## 3) Add environment variables in Web Service
Set these values (from Railway dashboard):

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://YOUR-RAILWAY-DOMAIN`
- `APP_KEY=base64:...` (generate locally once)

- `DB_CONNECTION=mysql`
- `DB_HOST=<MYSQL_HOST_FROM_RAILWAY>`
- `DB_PORT=<MYSQL_PORT_FROM_RAILWAY>`
- `DB_DATABASE=<MYSQL_DATABASE_FROM_RAILWAY>`
- `DB_USERNAME=<MYSQL_USER_FROM_RAILWAY>`
- `DB_PASSWORD=<MYSQL_PASSWORD_FROM_RAILWAY>`

Optional:
- `RUN_MIGRATIONS=true` (runs `php artisan migrate --force` on startup)

## 4) Deploy
Railway will build from `Dockerfile` automatically.

## 5) Verify
Open deployed URL and check app logs from Railway.

## Notes
- Container listens on Railway `PORT` automatically via `docker/railway/entrypoint.sh`.
- For production, prefer running migrations once via Railway shell/command instead of every restart.
