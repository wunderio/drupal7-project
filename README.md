# Drupal 7 + Composer + Lando project template

This template is based on the [drupal-composer/drupal-project](https://github.com/drupal-composer/drupal-project/tree/7.x) project template.

## Local environment

### [Setup](https://docs.lando.dev/basics/installation.html)

1. Install the [latest Lando](https://github.com/lando/lando/releases) and read the [documentation](https://docs.lando.dev/).
2. Update your project name and other Lando [Drupal 7 recipe](https://docs.lando.dev/config/drupal7.html)'s parameters at `.lando.yml`.
3. Define Drush site aliases at `drush/aliases.drushrc.php` & default remote environment at `.lando/syncdb.sh`.
4. Run `lando start`.
5. Import data with `lando syncdb <remote>` or `lando db-import <dumpfile>`.

### Local sites

- <https://project.lndo.site>, alias `@project.local`.

### [Services](https://docs.lando.dev/config/services.html)

- <https://adminer-project.lndo.site> - [Adminer](https://hub.docker.com/r/dehy/adminer/) for database management, log in **without** entering the credentials.
- <https://mail-project.lndo.site> - [MailHog](https://docs.lando.dev/config/mailhog.html) for mail management.

### [Tools](https://docs.lando.dev/config/tooling.html)

Full commands/tools overview is available at `lando`. Custom tools:

- `lando build` - build the local site.
- `lando npm` - run [npm](https://www.npmjs.com/) commands.
- `lando node` - run [Node.js](https://nodejs.org/) commands.
- `lando phpcs`, `lando phpcbf`- use PHP_CodeSniffer:
  - Use Drupal & DrupalPractice standard for selected extensions: `lando phpcs --standard=Drupal,DrupalPractice web/sites/all/modules/contrib --extensions=php,inc,module,install`
  - Check `web/sites/all/modules/custom` folder for PHP 7.2 compatibility using [PHPCompatibility](https://github.com/PHPCompatibility/PHPCompatibility) standard: `lando phpcs --standard=PHPCompatibility --extensions=php,inc,module,install --report-full=report_72.txt --runtime-set testVersion 7.2 -ps web/sites/all/modules/custom`.
- `lando syncdb <remote>` - synchronize local database with selected remote environment (default / `prod`).
- `lando update` - apply required (database) updates.
- `lando xdebug <mode>` - load [Xdebug](https://xdebug.org/) in the selected [mode(s)](https://xdebug.org/docs/all_settings#mode).

### How to convert an old Drush make project into this project template

1. Generate a raw composerfile of your old Drupal 7 project with `drush generate-makefile my.make` and `drush make-convert my.make --format=composer > raw-composer.json`.
2. Use the `require` list of `raw-composer.json` as a starting point for the requirements of the new project `composer.json`. Generate a new makefile, even if you already have one, to avoid problems with legacy issues.
3. Perform a requirements audit and remove / replace any legacy and unused components.
4. Move custom modules / themes to either `web/sites/all/modules/custom` or `web/sites/all/themes/custom`, respectively.
5. Run PHP compliance tests with the `lando phpcs` tool and update the code if necessary.
6. Use the `registry_rebuild` module to fix project paths.
7. Enable `composer_autoloader` module.

See also [drupal-composer/drupal-project](https://github.com/drupal-composer/drupal-project/tree/7.x) readme for the overall advices.
