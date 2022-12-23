FROM php:8.2-fpm-alpine
WORKDIR /usr/src/app
RUN apk add --update linux-headers
RUN sed -i -e 's#dl-cdn.alpinelinux.org#mirror.leaseweb.com#g' /etc/apk/repositories
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS
RUN apk add coreutils gmp-dev libpng-dev openssl-dev libxml2-dev shadow freetype-dev libjpeg-turbo-dev libpng-dev libwebp-dev zlib-dev libzip-dev
RUN usermod -u 1000 www-data ;\
 groupmod -g 1000 www-data ;\
 COMPOSER_SUM="$(wget -q -O - https://composer.github.io/installer.sig)" ;\
 wget -q -O /usr/src/app/composer-setup.php https://getcomposer.org/installer ;\
 echo "$COMPOSER_SUM composer-setup.php" > composer-setup.php.sha384 ;\
 sha384sum -c /usr/src/app/composer-setup.php.sha384 || exit 1;\
 php composer-setup.php --quiet --filename=composer --install-dir=/bin

RUN pecl install apcu && docker-php-ext-enable apcu

RUN docker-php-ext-configure gd --with-jpeg --with-freetype --with-webp ;\
  docker-php-ext-install -j`nproc` gd

RUN docker-php-ext-install bcmath exif gmp pdo pdo_mysql soap zip ;\
  docker-php-ext-enable soap
RUN apk add libzip-dev; docker-php-ext-install zip
RUN pecl install redis && docker-php-ext-enable redis
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN apk add rabbitmq-c rabbitmq-c-dev;\
    mkdir -p /usr/src/php/ext/amqp ;\
    curl -fsSL https://pecl.php.net/get/amqp | tar xvz -C "/usr/src/php/ext/amqp" --strip 1 ;\
    docker-php-ext-install amqp
RUN docker-php-ext-install sockets
RUN apk add --update --no-cache \
    libgcc libstdc++ libx11 glib libxrender libxext libintl \
    ttf-dejavu ttf-droid ttf-freefont ttf-liberation
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d/99-xdebug.ini
