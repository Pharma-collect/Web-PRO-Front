#!/bin/bash
composer install
php artisan key:generate 
composer require laravel/ui 
php artisan ui vue --auth
composer require laravel-frontend-presets/argon
php artisan ui argon 
composer dump-autoload

chmod 777 storage
chmod 777 storage/logs
chmod 777 bootstrap
chmod 777 bootstrap/cache
chmod 777 storage/framework/sessions
chmod 777 storage/framework/views