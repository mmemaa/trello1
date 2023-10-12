# Use an official PHP runtime as a parent image
FROM php:8.0-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY ./src /var/www/html

COPY php.ini /usr/local/etc/php/php.ini

# Expose port 80 for Apache
EXPOSE 80
