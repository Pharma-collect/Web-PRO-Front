#!/bin/bash

composer install
php artisan key:generate

chmod 777 storage
chmod 777 storage/logs
chmod 777 bootstrap
chmod 777 bootstrap/cache
chmod 777 storage/framework/sessions
chmod 777 storage/framework/views

