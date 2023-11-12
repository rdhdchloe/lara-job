#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

# echo "generating application key..."
# php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed

echo "Building assets with Vite..."
npm install --prefix /var/www/html
npm run production --prefix /var/www/html