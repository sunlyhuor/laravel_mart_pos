FROM php:8.0-apache

RUN apt-get update && \
    apt-get install -y libzip-dev unzip && \
    docker-php-ext-install zip pdo pdo_mysql && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

COPY . /var/www/html

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-interaction

RUN chown -R www-data:www-data storage

EXPOSE 80
