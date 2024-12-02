# Use official PHP image with necessary extensions
FROM php:8.2-fpm

# Install system dependencies for Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Set working directory in the container
WORKDIR /var/www

# Copy the Laravel project into the container
COPY . /var/www

# Set the correct permissions for storage and bootstrap cache
RUN chown -R www-data:www-data /var/www && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Install Composer (PHP dependency manager)
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Install Laravel dependencies using Composer
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Expose port 9000 to run PHP-FPM
EXPOSE 9000

# Command to run PHP-FPM
CMD ["php-fpm"]
