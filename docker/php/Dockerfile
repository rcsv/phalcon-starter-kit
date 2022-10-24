# Dockerfile of php-fpm detail

## use php 8.1 fpm image
FROM php:8.1-fpm

### install development libraries
RUN apt update && apt install -y \
    libfreetype6-dev \
    libpng-dev \
    zlib1g-dev \
    g++ \
    libicu-dev \
    libmcrypt4 \
    libzip-dev \
    libonig-dev \
    unzip \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mysqli \
        gd \
        zip \
        mbstring

### install composer
RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

## Xdebug
ARG WITH_XDEBUG=false

### flag whether
RUN set -eux; \
    if [ $WITH_XDEBUG = "true" ] ; then \
        pecl install xdebug; \
        docker-php-ext-enable xdebug; \
        echo "error_reporting = E_ALL" >>     /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_errors = On" >>         /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.mode = debug" >>         /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.idekey=PHPSTORM" >>      /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    fi ;


## Phalcon
RUN pecl install phalcon \
    && php -m
