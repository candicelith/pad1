#!/bin/sh
echo "DB_HOST=$DB_HOST"
echo "DB_PORT=$DB_PORT"
echo "🕒 Waiting for MySQL to be ready..."
until nc -z -v -w30 $DB_HOST $DB_PORT
do
  echo "Waiting for database connection at $DB_HOST:$DB_PORT..."
  sleep 5
done

# Copy .env kalau belum ada
if [ ! -f ".env" ]; then
    cp .env.example .env
fi

# Artisan commands
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan route:cache
php artisan view:clear
php artisan view:cache
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan config:cache
php artisan storage:link || true

# Jalanin Laravel pakai PHP built-in
exec php -S 0.0.0.0:8000 -t public