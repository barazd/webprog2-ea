#!/bin/bash
set -e

# Ha nincsen kulcs
if [ -z "$(grep '^APP_KEY=' .env | grep -v '=$')" ]; then
    php artisan key:generate
fi

# Migráció, mindent letúr
php artisan migrate:fresh --seed
php artisan storage:link  --force -n
php artisan optimize

exec "$@"