FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
        libzip-dev \
        unzip \
        git \
        libicu-dev \
        libpq-dev \
        && docker-php-ext-install \
        intl \
        zip \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        && docker-php-ext-enable apcu

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/symfony

RUN chown -R www-data:www-data /var/www/symfony

EXPOSE 9000

CMD ["php-fpm"]
