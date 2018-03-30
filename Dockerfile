FROM wayarmy/php:7.0-apache
COPY . /var/www/html
CMD ["apache2-foreground"]