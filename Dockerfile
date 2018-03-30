FROM wayarmy/php:7.0-apache
COPY . /var/www/html
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
CMD ["apache2-foreground"]
