# APP
FROM php:8.2-fpm-alpine AS app

WORKDIR /var/www
COPY --from=mlocati/php-extension-installer --link /usr/bin/install-php-extensions /usr/local/bin/

# Install system dependencies
RUN apk add \
		acl \
		fcgi \
		file \
		gettext \
		git \
		mariadb-client \
		mariadb-connector-c \
	;

RUN set -eux; \
    install-php-extensions \
        gd \
    	zip \
		pdo_mysql \
        curl \
    ;

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY --link docker/php/php-fpm.d/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
RUN mkdir -p /var/run/php

RUN rm -rf /var/cache/apk/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY composer.* ./
RUN set -eux; \
	composer install --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress; \
	composer clear-cache

# remove default server definition
RUN rm -rf /var/www/html

# copy existing application directory contents
COPY . /var/www

# copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

COPY .env.example .env

# copy and make executable the entrypoint
COPY --link docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

# change current user to www-data (default nginx user)
USER www-data

ENTRYPOINT ["docker-entrypoint"]

CMD ["php-fpm"]

# NGINX
FROM nginx:1.9-alpine AS nginx

COPY --link docker/nginx/templates/default.conf.template /etc/nginx/conf.d/default.conf.template

# NODE JS
FROM node:20 AS nodejs

WORKDIR /var/www

# Copy `package.json` and `package-lock.json`
COPY package*.json ./

# Install project dependencies with logging
RUN npm install --loglevel=verbose

# Copy project files into the docker image
COPY . .

# Expose the port Vite runs on
EXPOSE 3000

CMD ["npm", "run", "watch"]