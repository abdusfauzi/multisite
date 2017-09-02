# Multisite

A [multisite](http://codex.wordpress.org/Glossary#Multisite) plugin for [WordPlate](https://wordplate.github.io/).

> **Note:** This plugin is still under development, you may use it at your own risk. We haven't had any issues ourselves but please be cautious.

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```sh
composer require wordplate/multisite
```

1. Login to the WordPress administrator dashboard and active the Multisite plugin.

2. Add the `WP_ALLOW_MULTISITE` environment variable, in your `.env` file, set it to true.

3. Navigate to *Tools > Network Setup* in the administrator dashboard and install either sub-domains or sub-directories.

4. Logout from WordPress.

5. Add the `WP_MULTISITE` environment variable, in your `.env` file, set it to true.

6. Log back in to WordPress and you're all set.

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.com)
