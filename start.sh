#!/bin/bash

# Start the Apache web server
apache2-foreground &

# Run any other commands here
composer install && composer dump-autoload

# Wait indefinitely
tail -f /dev/null