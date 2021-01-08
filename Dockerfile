FROM php:7.4.1-apache

USER root

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        zip \
        curl \
        unzip \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-source delete

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite


COPY ./app/ /var/www/html/app/
COPY ./bootstrap/ /var/www/html/bootstrap/
COPY ./config/ /var/www/html/config/
COPY ./public/ /var/www/html/public/
COPY ./resources/ /var/www/html/resources/
COPY ./routes/ /var/www/html/routes/
COPY ./storage/ /var/www/html/storage/
COPY ./tests/ /var/www/html/tests/
COPY ./vendor/ /var/www/html/vendor/
COPY .env /var/www/html/.env
COPY artisan /var/www/html/artisan
COPY composer.json /var/www/html/composer.json
COPY composer.lock /var/www/html/composer.lock
COPY package.json /var/www/html/package.json
COPY phpunit.xml /var/www/html/phpunit.xml
COPY server.php /var/www/html/server.php
COPY webpack.mix.js /var/www/html/webpack.mix.js

COPY install.sh /var/www/html/install.sh

RUN ./install.sh

