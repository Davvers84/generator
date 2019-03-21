FROM php:7-fpm

RUN apt-get update && apt-get -y upgrade

# PHP extensions
RUN apt-get install -y mysql-client
RUN docker-php-ext-install pdo_mysql

# Composer
RUN apt-get install -y curl software-properties-common
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# NodeJS and NPM
RUN apt-get install -y gnupg libpng-dev
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
RUN apt-get install -y nodejs

# Kafka
RUN apt-get install -y librdkafka-dev
RUN pecl install rdkafka && docker-php-ext-enable rdkafka

# ZIP
RUN apt-get install -y zip unzip
