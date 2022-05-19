# Cache Assets

This extension offers a command `php flarum cache:assets` that allows you to compile and save Javascript, Css and locale Javascript/Css ahead of any user request to either the forum or admin.

> This is an extension that is extremely suitable for Continuous Deployment scenarios.

### Installation

Install with composer:

```sh
composer require blomstra/cache-assets:*
```

Go to your admin area and enable the extension.

#### Use the command

Run the `php flarum cache:assets --help` command to see a list of all options, at least one flag is required for the command to do anything:

`--js` to compile the javascript
`--css` to compile the less/css
`--locales` to compile css and js of the language packs

### Links

- [Packagist](https://packagist.org/packages/blomstra/cache-assets)
- [GitHub](https://github.com/blomstra/flarum-ext-cache-assets)
