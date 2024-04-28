# Use an official PHP runtime as a base image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install any dependencies your PHP application might have
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql

# Expose port 80 to the Docker host, so you can access the application via the browser
EXPOSE 80