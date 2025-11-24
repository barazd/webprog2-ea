#!/bin/bash
set -e

chown -R www-data:www-data .

# Migráció, mindent letúr
php artisan migrate:fresh --seed
php artisan storage:link  --force -n
php artisan optimize

exec "$@"