FROM php:8.1-apache

# Install system dependencies and PHP extensions required for Laravel & PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libgd-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql zip mbstring xml bcmath ctype intl curl gd dom fileinfo

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Copy project files (including local vendor directory)
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Create storage and cache directories if they don't exist
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache bootstrap/cache

# Change document root to Laravel's public folder
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
