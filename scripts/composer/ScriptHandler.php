<?php

/**
 * @file
 * Contains \DrupalProject\composer\ScriptHandler.
 */

namespace DrupalProject\composer;

use Composer\Script\Event;
use DrupalFinder\DrupalFinder;
use Symfony\Component\Filesystem\Filesystem;

class ScriptHandler {

  public static function createRequiredFiles(Event $event) {
    $fs = new Filesystem();
    $drupalFinder = new DrupalFinder();
    $drupalFinder->locateRoot(getcwd());
    $drupalRoot = $drupalFinder->getDrupalRoot();

    $dirs = [
      'sites/all/modules',
      'profiles',
      'sites/all/themes',
    ];

    // Required for unit testing
    foreach ($dirs as $dir) {
      if (!$fs->exists($drupalRoot . '/'. $dir)) {
        $fs->mkdir($drupalRoot . '/'. $dir);
        $fs->touch($drupalRoot . '/'. $dir . '/.gitkeep');
      }
    }

    // Prepare the settings file for installation
    if (!$fs->exists($drupalRoot . '/sites/default/settings.php') && $fs->exists($drupalRoot . '/sites/default/default.settings.php')) {
      $fs->copy($drupalRoot . '/sites/default/default.settings.php', $drupalRoot . '/sites/default/settings.php');
      $fs->chmod($drupalRoot . '/sites/default/settings.php', 0666);
      $event->getIO()->write("Created a sites/default/settings.php file with chmod 0666");
    }

    // Create the files directory with chmod 0777
    if (!$fs->exists($drupalRoot . '/sites/default/files')) {
      $oldmask = umask(0);
      $fs->mkdir($drupalRoot . '/sites/default/files', 0777);
      umask($oldmask);
      $event->getIO()->write("Created a sites/default/files directory with chmod 0777");
    }
  }

  /**
   * Remove project-internal files after create project.
   */
  public static function removeInternalFiles(Event $event) {
    $fs = new Filesystem();

    // List of files to be removed.
    $files = [
      '.travis.yml',
      'LICENSE',
      'phpunit.xml.dist',
      'web/.gitignore',
      'web/CHANGELOG.txt',
      'web/INSTALL.mysql.txt',
      'web/INSTALL.pgsql.txt',
      'web/INSTALL.sqlite.txt',
      'web/install.php',
      'web/INSTALL.txt',
      'web/MAINTAINERS.txt',
      'web/README.txt',
      'web/update.php',
      'web/UPGRADE.txt',
    ];

    foreach ($files as $file) {
      if ($fs->exists($file)) {
        $fs->remove($file);
      }
    }
  }

}
