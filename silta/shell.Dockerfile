# Dockerfile for the Shell container.
FROM wunderio/silta-php-shell:php7.4-v1

COPY --chown=www-data:www-data . /app
