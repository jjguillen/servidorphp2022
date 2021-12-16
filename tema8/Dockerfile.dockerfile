FROM php:8.0-apache

RUN apt update -y
#RUN apt install -y git
RUN apt-get update && apt-get install --yes --no-install-recommends \
    libssl-dev

# Instalar Composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar librería Mongo
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Copiar app
#COPY ./mongoPrueba /var/www/html
WORKDIR /var/www/html/

#RUN composer require mongodb/mongodb


