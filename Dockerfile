FROM php:8.2-cli-alpine3.17

RUN apk add --no-cache \
    bash \
    gnupg \
    libzip-dev \
    nodejs~=18 \
    npm~=9 \
    unzip \
    zip \
    libpng-dev \
    icu-dev \
    icu-libs

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer && \
    composer self-update

RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo_mysql zip bcmath intl exif gd

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

COPY . /var/www/html

RUN composer install --optimize-autoloader --no-suggest --no-interaction --no-dev
RUN npm ci
RUN npm run build

RUN chmod +x /var/www/html/docker/entrypoint.sh
RUN chmod +x /var/www/html/docker/healthcheck.sh

ENTRYPOINT ["bash", "/var/www/html/docker/entrypoint.sh"]
HEALTHCHECK --interval=5s --timeout=3s --start-period=5s --retries=3 CMD bash /var/www/html/docker/healthcheck.sh
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]
