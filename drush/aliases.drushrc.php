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

$aliases['master'] = [
  'uri' => 'master.drupal7-project.dev.wdr.io',
  'remote-host' => 'master-shell.drupal7-project',
  'remote-user' => 'www-admin',
  'root' => '/app/web',
  'path-aliases' => [
    '%files' => '/app/web/sites/default/files',
    '%dump-dir' => '/tmp',
    '%drush' => '/app/vendor/bin/drush',
  ],
  'ssh-options' => '-J www-admin@ssh.dev.wdr.io',
  'command-specific' => [
    'sql-sync' => [
      'no-cache' => TRUE,
      'no-ordered-dump' => TRUE,
      'structure-tables' => [
        'custom' => [
          'cache',
          'cache_filter',
          'cache_menu',
          'cache_page',
          'cache_views_data',
          'history',
          'sessions',
        ],
      ],
    ],
  ],
];
