FROM php:8.1-apache

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pgsql pdo_pgsql

COPY index.php /var/www/html/index.php