#!/bin/sh
chown -R www-data:www-data storage bootstrap/cache
chmod -R 755 storage bootstrap/cache

php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan migrate
php artisan db:seed
