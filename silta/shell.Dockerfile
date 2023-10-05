# Dockerfile for the Shell container.
FROM wunderio/silta-php-shell:php7.3

COPY --chown=www-data:www-data . /app
