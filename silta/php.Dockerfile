# Dockerfile for the PHP container.
FROM wunderio/silta-php-fpm:7.3-fpm-test

COPY --chown=www-data:www-data . /app
