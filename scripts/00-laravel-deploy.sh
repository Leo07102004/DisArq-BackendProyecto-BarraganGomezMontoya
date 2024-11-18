#!/usr/bin/env bash 
echo "Running composer" 
composer global require hirak/prestissimo --ignore-platform-reqs
composer install --no-dev --working-dir=/var/www/html 
composer require fakerphp/faker
#echo "generating application key..." 
#php artisan key:generate --show 
echo "Caching config..."
php artisan config:cache 
echo "Caching routes..." 
php artisan route:cache 
echo "Running migrations..." 
php artisan migrate:refresh --force
php artisan migrate --force
php artisan db:seed --force