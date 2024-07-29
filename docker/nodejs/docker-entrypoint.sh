#!/bin/sh
set -ex

# RUN rm -rf node_modules package-lock.json && \
if [ -d "/node_modules" ]; then
  rm -rf /node_modules
fi

if [ -f "/package-lock.json" ]; then
  rm -rf /package-lock.json
fi

exec "$@"

