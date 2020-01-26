#!/bin/sh
set -exu

# Symlink the site aliases file.
mkdir -p ~/.drush
ln -sf /app/drush/aliases.drushrc.php ~/.drush/"$LANDO_APP_NAME".aliases.drushrc.php
drush cc drush
