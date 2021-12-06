#!/bin/bash

set -eux

cd ~/laravel-vue-app
php artisan migrate --force
php artisan config:cache
