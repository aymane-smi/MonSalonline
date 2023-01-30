FROM php:7.4-apache
RUN a2enmod rewrite && service apache2 restart
RUN docker-php-ext-install pdo pdo_mysql
ENV upload_max_filesize=64M
WORKDIR /var/www/html