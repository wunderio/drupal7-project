# Dockerfile for the PHP container.
FROM wunderio/silta-php-fpm:7.4-fpm-v1

COPY --chown=www-data:www-data . /app
