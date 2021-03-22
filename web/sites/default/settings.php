<?php

/**
 * @file
 * General settings.
 */

/**
 * Database settings, overridden per environment.
 */
$databases = [];
$databases['default']['default'] = [
  'database' => $_ENV['DB_NAME'],
  'username' => $_ENV['DB_USER'],
  'password' => $_ENV['DB_PASS'],
  'host' => $_ENV['DB_HOST'],
  'port' => '3306',
  'driver' => 'mysql',
];

/**
 * Environment-specific settings.
 */
$env = $_ENV['ENVIRONMENT_NAME'];
switch ($env) {
  case 'production':
    break;

  case 'master':
    break;

  case 'local':
    // Salt for one-time login links etc.
    $drupal_hash_salt = md5(getenv('LANDO_HOST_IP'));
    break;

  default:
    break;
}

/**
 * The default list of directories that will be ignored by Drupal's file API.
 */
$conf['file_scan_ignore_directories'] = array(
  'node_modules',
  'bower_components',
);

 /**
 * Silta injects it's own Drupal 7 settings file automatically when `drupalCoreVersion: "7"` is
 * defined in https://github.com/wunderio/drupal7-project/blob/master/silta/silta.yml.
 * @see https://github.com/wunderio/charts/blob/master/drupal/files/settings.silta.d7.php
 * file for the details.
 */
