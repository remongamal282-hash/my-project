#!/bin/sh
set -e

PORT_TO_USE="${PORT:-8080}"

sed -ri "s/Listen 80/Listen ${PORT_TO_USE}/g" /etc/apache2/ports.conf
sed -ri "s/:80>/:${PORT_TO_USE}>/g" /etc/apache2/sites-available/000-default.conf

if [ -n "${APP_KEY}" ]; then
  php artisan config:cache || true
  php artisan route:cache || true
  php artisan view:cache || true
fi

if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
  php artisan migrate --force
fi

exec "$@"
