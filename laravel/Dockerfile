FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

COPY composer.lock composer.json /var/www/html/

RUN apk update && \
    apk add --no-cache \
        bash \
        git \
        zip \
        unzip \
        libzip-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev \
    && docker-php-ext-configure gd \
        --with-freetype=/usr/include/ \
        --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) \
        gd \
        zip \
        pdo_mysql \
    && docker-php-ext-enable \
        opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

RUN chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
