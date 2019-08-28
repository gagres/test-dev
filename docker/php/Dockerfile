FROM php:7.2-fpm

# # Download php extensions
# RUN apt-get update && apt-get install -y libmcrypt-dev \
#     libmagickwand-dev --no-install-recommends \
#     && pecl install imagick \
#     && docker-php-ext-enable imagick

# # Install Postgre PDO
# RUN apt-get install -y libpq-dev \
#     && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#     && docker-php-ext-configure zip --with-libzip \
#     && docker-php-ext-install pdo pdo_pgsql pgsql zip

# # Configure composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /opt/test-dev
WORKDIR /opt/test-dev

RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    unzip

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip

RUN curl --silent --show-error https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

COPY docker/php/init.sh /etc

RUN chmod +x /etc/init.sh

RUN cp .docker.env .env

RUN composer install
