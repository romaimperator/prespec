#!/usr/bin/env bash

set -e

FILENAME=$1
main() {
  php -f "lib/spec_reader.php" -- $FILENAME
}

main

