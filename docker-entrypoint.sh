#!/bin/bash
set -e

# Migráció, mindent letúr
php artisan migrate:fresh --seed
php artisan storage:link  --force -n
php artisan optimize

exec "$@"