FROM php:8.2-cli-alpine3.17

RUN mkdir -p /var/www/html
RUN mkdir -p /var/www/html/databasestore

WORKDIR /var/www/html

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

COPY ./ /var/www/html

RUN composer install --optimize-autoloader --no-suggest --no-interaction --no-dev
RUN npm ci
RUN npm run build

RUN chmod +x /var/www/html/docker/entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["bash", "/var/www/html/docker/entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]
