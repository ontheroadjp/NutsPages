#!/bin/sh

echo 'start install.sh'
echo 'install npm packages...'
npm install

echo 'install bower components...'
bower install

echo 'install composer modules...'
composer install

echo 'execute gulp build...'
gulp build

echo 'initialize .env file'
cp .env.sample .env
php artisan key:generate

echo 'complete!'

