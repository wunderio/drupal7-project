<?php

/**
 * @file
 * Settings for Lando environment.
 */

// Database credentials from Lando environment.
$lando_info = json_decode(getenv('LANDO_INFO'), TRUE);
$databases['default']['default'] = [
  'driver' => 'mysql',
  'database' => $lando_info['database']['creds']['database'],
  'username' => $lando_info['database']['creds']['user'],
  'password' => $lando_info['database']['creds']['password'],
  'host' => $lando_info['database']['internal_connection']['host'],
  'port' => $lando_info['database']['internal_connection']['port'],
];

// Salt for one-time login links and cancel links, form tokens, etc.
$drupal_hash_salt = md5(getenv('LANDO_HOST_IP'));
