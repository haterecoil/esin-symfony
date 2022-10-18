# ./docker/php/Dockerfile
FROM php:8.1-fpm

RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    libicu-dev \
    libssh-dev

# PHP PDO
RUN docker-php-ext-install pdo_mysql

# PHP INTL
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# PHP ZIP
RUN docker-php-ext-install zip

# PHP APCU
RUN pecl install apcu
RUN docker-php-ext-enable apcu

# PHP MEMORY LIMIT
RUN echo '\
memory_limit = 512M\n\
' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

# PHP EXEC TIME
RUN echo '\
max_execution_time = 600\n\
' >> /usr/local/etc/php/conf.d/docker-php-max_execution_time.ini

# COMPOSER
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && mv composer /usr/local/bin/composer

WORKDIR /srv/esin

RUN PATH=$PATH:/srv/esin/vendor/bin:bin