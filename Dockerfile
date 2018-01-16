FROM php:5.6-apache

RUN pecl install xdebug-2.5.5 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_mysql

# Set up debugger
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini

# Provide host ip, on a mac the special dns name can be used:
# https://docs.docker.com/docker-for-mac/networking/#there-is-no-docker0-bridge-on-macos
# Optionally this could be set as an environment variable for better cross platform compatibility
RUN echo "xdebug.remote_host=docker.for.mac.localhost" >> /usr/local/etc/php/php.ini

# COPY src/ /var/www/html/ - only necessary when creating an image, not useful for general development
# Add `-v src/:/var/www/html` to PhpStorm's Docker runtime configuration arguments, not including the backticks