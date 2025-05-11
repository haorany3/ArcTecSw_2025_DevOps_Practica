FROM php:8.1-apache

# Instalar las cabeceras y librerías de PostgreSQL
RUN apt-get update \
    && apt-get install -y --no-install-recommends libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql \
    && docker-php-ext-enable pgsql pdo_pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copiar el código de la aplicación
COPY index.php /var/www/html/index.php
