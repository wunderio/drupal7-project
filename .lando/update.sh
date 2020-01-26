#!/bin/bash
set -exu

LOCAL=@"$LANDO_APP_NAME".local

# Update local database.
drush "$LOCAL" updb -y
# drush "$LOCAL" fra

# Enable composer_autoloader module
# @see: https://github.com/drupal-composer/drupal-project/blob/7.x/README.md#how-to-enable-the-composer-autoloader-in-your-drupal-7-website
drush "$LOCAL" en composer_autoloader -y

# Enable development modules
# drush "$LOCAL" en -y stage_file_proxy update devel
# drush "$LOCAL" vset stage_file_proxy_origin ''

# drush "$LOCAL" cron
drush "$LOCAL" cc drush
drush "$LOCAL" cc all -y
drush "$LOCAL" uli
