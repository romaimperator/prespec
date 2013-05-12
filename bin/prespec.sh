#!/usr/bin/env bash

set -e

PRESPEC="lib/prespec.php"
FILENAME=$1
main() {
  php_command $PRESPEC -- $FILENAME
}

php_command() {
  php -f $*
}

main

