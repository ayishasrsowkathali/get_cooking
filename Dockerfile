# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory to the web server's document root
WORKDIR /var/www/html

# Copy the contents of the get_cooking directory into the container's working directory
COPY get_cooking/ /var/www/html/

# Install any dependencies your app requires
RUN apt-get update
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_mysql

# Configure the Apache web server if needed
# For example, enable Apache modules or set up virtual hosts

# Expose the port that your Apache server listens on (usually port 80)
EXPOSE 80

# Define the command to start the Apache server
CMD ["apache2-foreground"]
