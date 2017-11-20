#!/bin/bash
. ~/.nvm/nvm.sh

nvm use 9.2.0
npm run prod
php artisan serve
