# Dockerfile
FROM php:8.2-cli

# Install the PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Set the working directory
WORKDIR /var/www/html

# Copy the existing source code
COPY ./src /var/www/html/src
COPY ./public /var/www/html/public
