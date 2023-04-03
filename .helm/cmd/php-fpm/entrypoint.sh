#!/bin/sh

set -e

if [ -z "$MYSQL_PORT" ]; then
  echo >&2 'error: missing MYSQL_PORT environment variable'
  exit 1
fi

if [ -z "$MYSQL_HOST" ]; then
  echo >&2 'error: missing MYSQL_HOST environment variable'
  exit 1
fi

if [ -z "$MYSQL_DATABASE" ]; then
  echo >&2 'error: missing MYSQL_DATABASE environment variable'
  exit 1
fi

if [ -z "$MYSQL_USER" ]; then
  echo >&2 'error: missing MYSQL_USER environment variable'
  exit 1
fi

if [ -z "$MYSQL_PASSWORD" ]; then
  echo >&2 'error: missing MYSQL_PASSWORD environment variable'
  exit 1
fi

exec "$@"
