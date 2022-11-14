FROM php:8.1-fpm
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apt-get update && docker-php-ext-install pdo pdo_mysql

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer