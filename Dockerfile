FROM wordpress:php8.3-apache

# Copy the whole project into the webroot
COPY . /var/www/html

# Adjust permissions so WordPress can write to wp-content
RUN chown -R www-data:www-data /var/www/html/wp-content

EXPOSE 80
