FROM php:8.1-apache
RUN apt-get update -y ;
RUN apt-get install --yes --no-install-recommends \
    openssl libssl-dev libcurl4-openssl-dev

# Instalar librería Mongo
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

EXPOSE 80

WORKDIR /var/www/html/

