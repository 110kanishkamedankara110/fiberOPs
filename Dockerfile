# Use the official PHP 8.2 Apache image
FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy all files from the root directory of your project to the container's /var/www/html
COPY --chown=www-data:www-data . /var/www/html/

# Ensure correct permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Modify Apache configuration to allow access
RUN echo "<Directory /var/www/html>\n\
           AllowOverride All\n\
           Require all granted\n\
       </Directory>" >> /etc/apache2/sites-available/000-default.conf

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in foreground mode
CMD ["apache2-foreground"]
