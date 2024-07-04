Requirements
============

You need @hotwired/stimulus to use this bundle.

You can install symfony/stimulus-bundle.

Installation
============

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
composer require wild-siena/google-maps-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
composer require wild-siena/google-maps-bundle
```

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    WildSiena\GoogleMapsBundle\WildSienaGoogleMapsBundle::class => ['all' => true],
];
```

If you're using WebpackEncore
-----------------------------
Install your dependencies and restart your watcher.
```console
npm install --force
npm run watch

# or use yarn
yarn install --force
yarn watch
```

Documentation
============
For more information see the [Documentation](./docs/index.md) there you find some examples.

Roadmap
=======