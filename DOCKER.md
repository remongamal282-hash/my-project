# Docker Setup

## 1) Build and start containers

```bash
docker compose up -d --build
```

## 2) Install app key (once if missing)

```bash
docker compose exec app php artisan key:generate
```

## 3) Run migrations and seeders

```bash
docker compose exec app php artisan migrate --seed
```

## 4) Open app

- http://localhost:8000

## Useful commands

```bash
# Stop containers
docker compose down

# Stop and remove DB volume
docker compose down -v

# Enter app shell
docker compose exec app bash
```

## Notes

- App container connects to MySQL service using host `mysql` and port `3306`.
- Host machine can access MySQL on `127.0.0.1:3307`.
- Current setup allows empty MySQL root password for local development only.
