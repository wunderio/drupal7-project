# Dockerfile for the Drupal container.
FROM eu.gcr.io/silta-images/shell:php7.2

COPY --chown=www-data:www-data . /app

