#!/bin/bash

# Ensure the script stops if any command fails
set -e

# Variables
DIR="/var/www/codehacks"
BRANCH="main"
REMOTE="origin"

echo "Navigating to project directory: $DIR"
cd $DIR

echo "Pulling latest changes from $REMOTE/$BRANCH..."
git pull $REMOTE $BRANCH

echo "Installing Node.js dependencies..."
npm install

echo "Installing Composer dependencies..."
composer install

echo "Setting application environment to production..."
php artisan config:cache

echo "Clearing Laravel cache..."
php artisan cache:clear

echo "Clearing route cache..."
php artisan route:clear

echo "Caching routes for faster performance..."
php artisan route:cache

echo "Clearing Laravel configuration cache..."
php artisan config:clear

echo "Caching Laravel configuration for faster performance..."
php artisan config:cache

echo "Running Laravel migrations..."
php artisan migrate

echo "Clearing Laravel view cache..."
php artisan view:clear

echo "Optimizing the framework for better performance..."
php artisan optimize

echo "npm building the project..."
npm run build

echo "Script completed successfully!"
