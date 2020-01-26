# Drupal 7 + Composer + Lando project template

This template is based on the [drupal-composer/drupal-project](https://github.com/drupal-composer/drupal-project/tree/7.x) project template.

## Local environment with Lando

### Setup

1. Install the latest [Lando](https://docs.lando.dev/basics/installation.html) and read the [documentation](https://docs.lando.dev/).
2. Check out the repo and go to the project root: `git@github.com:wunderio/drupal7-project.git project && cd project`
3. Start the site by running `lando start`.
4. Import data: `lando db-import <dumpfile>`.

### Local sites

- <https://project.lndo.site>, alias `@project.local`.

### Services

- <https://adminer-project.lndo.site> - Adminer for database management, log in **without** entering the credentials.
- <https://mail-project.lndo.site> - Mailhog for mail management.

### Tools

Full commands/tools overview is available at `lando`. Custom tools:

- `lando build` - build the local site.
- `lando update` - apply required (database) updates.
