#!/bin/sh

echo 'start install.sh'
echo 'install npm packages...'
npm install

echo 'install bower components...'
bower install --allow-root

echo 'install composer modules...'
composer install

echo 'execute gulp build...'
gulp build

echo 'initialize .env file'
cp .env.example .env
php artisan key:generate

echo 'publish vendor resources...'
php artisan vendor:publish

echo 'complete!'

