#!/bin/sh

set -e

if [[ -z $1 ]]; then
  echo >&2 'error: missing parameter environment name in migrate.sh'
  exit 1
fi

cd /var/www/html
su -s /bin/sh -c "php yii migrate --interactive=0" www-data
