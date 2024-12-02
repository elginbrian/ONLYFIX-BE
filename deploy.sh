#!/bin/bash 

# Make sure this file has executable permissions, run `chmod +x deploy.sh` to ensure it does

# Variable name to check maintenance mode
ENV_VAR_NAME="MAINTENANCE_MODE"

# Check if the environment variable is set to "true"
if [[ "${!ENV_VAR_NAME}" = "true" ]]; then
  echo "Entering maintenance mode..."
  php artisan down
fi

# Install Laravel Octane if not installed (Ensure it's in composer.json)
echo "Installing Laravel Octane..."
composer require laravel/octane

# Install RoadRunner if not installed
echo "Installing RoadRunner..."
composer require spiral/roadrunner

# Install the RoadRunner binary
php artisan octane:install roadrunner

# Build assets using NPM
npm run build

# Clear cache
php artisan optimize:clear

# Cache the various components of the Laravel application
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache

# Run any database migrations
php artisan migrate --force

# Start Octane (add this line if you're using Laravel Octane with RoadRunner)
php artisan octane:start --host=0.0.0.0 --port=$PORT --server=roadrunner --workers=auto --no-interaction --watch

# Check if the environment variable is set to "false" or not set at all
if [[ "${!ENV_VAR_NAME}" = "false" ]] || [[ -z "${!ENV_VAR_NAME}" ]]; then
  echo "Exiting maintenance mode..."
  php artisan up
fi
