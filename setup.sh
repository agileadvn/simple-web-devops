#!/bin/bash +x
set -e pipefail

docker-compose -f docker-compose-php.yaml build php-simple-web
docker-compose -f docker-compose-php.yaml up -d