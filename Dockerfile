FROM php:8.1.6-fpm-alpine

# Install PHP extension
RUN docker-php-ext-install pdo pdo_mysql

# Install system dependencies
RUN apk add libzip-dev

# Get latest Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www
