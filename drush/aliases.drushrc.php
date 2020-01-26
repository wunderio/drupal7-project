<?php

/**
 * Define Drush site aliases.
 * Use `prod` as production site alias, see `.lando/syncdb.sh`.
 */
$name = getenv('LANDO_APP_NAME');

$aliases['local'] = [
  'root' => '/app/web',
  'uri' => 'https://' . $name . '.lndo.site/',
  'path-aliases' => 
  [
    '%site' => 'sites/default/',
    '%files' => 'sites/default/files',
  ],
];
