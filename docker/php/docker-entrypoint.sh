#!/bin/sh
set -ex

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
  set -- php-fpm "$@"
fi

if [ "$1" = 'php-fpm' ] || [ "$1" = 'php' ] || [ "$1" = 'bin/console' ]; then

  # Run composer install if vendor directory doesn't exist
  if [ ! -d /var/www/vendor ]; then
      composer install --optimize-autoloader --no-progress --no-interaction
  fi

  echo "Waiting for database to be ready..."

  ATTEMPTS_LEFT_TO_REACH_DATABASE=60
  until [ $ATTEMPTS_LEFT_TO_REACH_DATABASE -eq 0 ] || DATABASE_ERROR=$(php artisan db:monitor 2>&1); do
    sleep 1
    ATTEMPTS_LEFT_TO_REACH_DATABASE=$((ATTEMPTS_LEFT_TO_REACH_DATABASE - 1))
    echo "Still waiting for database to be ready... Or maybe the database is not reachable. $ATTEMPTS_LEFT_TO_REACH_DATABASE attempts left."
  done

  if [ $ATTEMPTS_LEFT_TO_REACH_DATABASE -eq 0 ]; then
    echo "The database is not up or not reachable:"
    echo "$DATABASE_ERROR"
    exit 1
  else
    echo "The database is now ready and reachable"
  fi

  #create laravel default folders
  mkdir -p /var/www/storage/framework/cache /var/www/storage/framework/sessions /var/www/storage/framework/views /var/www/storage/logs /var/www/storage/framework/testing

  # Run migrations
  php artisan migrate --force

  php artisan optimize
  php artisan optimize:clear
fi

exec docker-php-entrypoint "$@"