FROM php:7.1-fpm
RUN apt-get update && apt-get upgrade -y && apt-get install -y sudo libcurl4-gnutls-dev curl \
libmcrypt-dev zip unzip postgresql-server-dev-all libfreetype6-dev \
libjpeg62-turbo-dev libpng12-dev libpcre3-dev
RUN docker-php-ext-install iconv mcrypt
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install mbstring pdo_mysql tokenizer pdo_pgsql gd exif opcache
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin \
        --filename=composer
RUN usermod  -u 1000 www-data
RUN groupmod -g 1000 www-data

CMD ["php-fpm"]
