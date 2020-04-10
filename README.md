# Cache Assets

This extension offers a command `php flarum cache:assets` that allows you to compile and save Javascript, Css and locale Javascript/Css ahead of any user request to either the forum or admin.

> This is an extension that is extremely suitable for Continuous Deployment scenarios.

### Installation
Use [Bazaar](https://discuss.flarum.org/d/5151) or install manually with composer:

```sh
composer require bokt/flarum-cache-assets
```

Go to your admin area and enable the extension.

#### Use the command

Run the `php flarum cache:assets --help` command to see a list of all options, at least one flag is required for the command to do anything:

`--js` to compile the javascript
`--css` to compile the less/css
`--locales` to compile css and js of the language packs

### Updating

```sh
composer require bokt/flarum-cache-assets
```

### Links

- [Packagist](https://packagist.org/packages/bokt/flarum-cache-assets)
- [GitHub](https://github.com/bokt/flarum-cache-assets)
