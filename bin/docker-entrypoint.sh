#!/bin/bash

set -ex


VENDOR="/app/vendor/"
if ! [ -d "$VENDOR" ]; then
    # Take action if $DIR exists. #
    echo "Installing composer"
    composer install
fi


# shellcheck disable=SC1091

set -o errexit
set -o nounset
set -o pipefail


# Load libraries
. /opt/bitnami/scripts/liblaravel.sh
. /opt/bitnami/scripts/liblog.sh
. /opt/bitnami/scripts/libservice.sh

# Load Laravel environment
. /opt/bitnami/scripts/laravel-env.sh

cd /app

# print_welcome_page

if [[ "$*" = *"/opt/bitnami/scripts/laravel/run.sh"* ]]; then
    info "** Running Laravel setup **"
    /opt/bitnami/scripts/php/setup.sh
    /opt/bitnami/scripts/laravel/setup.sh
    info "** Laravel setup finished! **"
fi

echo ""
exec "$@"

declare -a start_flags=("artisan" "serve" "--host=0.0.0.0" "--port=${LARAVEL_PORT_NUMBER}")
start_flags+=("$@")

info "** Starting Laravel project **"
php "${start_flags[@]}"
# set -o xtrace # Uncomment this line for debugging purposes