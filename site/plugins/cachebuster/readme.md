# Kirby Cachebuster Plugin

This plugin will add modification timestamps to your css and js files,
as long as they are embedded with the css() and js() helpers.

## Requirements

This plugin requires Kirby 2.3. Older Kirby 2 versions are supported by version 2.0.0 of this plugin.

## Installation

To use this plugin, add the cachebuster.php to `site/plugins`.

Now you can activate the plugin with following line in your `config.php`.

```
c::set('cachebuster', true);
```

## Authors

Bastian Allgeier <bastian@getkirby.com> & Lukas Bestle <lukas@getkirby.com>
