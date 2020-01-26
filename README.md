# Drupal 7 + Composer + Lando project template

This template is based on the [drupal-composer/drupal-project](https://github.com/drupal-composer/drupal-project/tree/7.x) project template.

## Local environment

### [Setup](https://docs.lando.dev/basics/installation.html)

1. Install the [latest Lando](https://github.com/lando/lando/releases) and read the [documentation](https://docs.lando.dev/).
2. Update your project name and other Lando [Drupal 7 recipe](https://docs.lando.dev/config/drupal7.html)'s parameters at `.lando.yml`.
3. Run `lando start`.
4. Import data with `lando db-import <dumpfile>`.

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
- `lando update` - apply required (database) updates.
- `lando xdebug-on`, `lando xdebug-off` - enable / disable [Xdebug](https://xdebug.org/) for [nginx](https://nginx.org/en/).
