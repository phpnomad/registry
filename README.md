# phpnomad/registry

[![Latest Version](https://img.shields.io/packagist/v/phpnomad/registry.svg)](https://packagist.org/packages/phpnomad/registry)
[![Total Downloads](https://img.shields.io/packagist/dt/phpnomad/registry.svg)](https://packagist.org/packages/phpnomad/registry)
[![PHP Version](https://img.shields.io/packagist/php-v/phpnomad/registry.svg)](https://packagist.org/packages/phpnomad/registry)
[![License](https://img.shields.io/packagist/l/phpnomad/registry.svg)](https://packagist.org/packages/phpnomad/registry)

`phpnomad/registry` gives you a small kit of interfaces and traits for building named object registries. You define a class, implement the contracts you need, drop in the matching traits, and you have a working store that holds callables and resolves them to objects on first read. It is the shape PHPNomad applications use whenever they need a keyed collection of lazily-built services, handlers, or definitions.

## Installation

```bash
composer require phpnomad/registry
```

## Overview

- `CanSet`, `CanGet`, and `CanDelete` interfaces define the standard registry contracts
- `WithSet`, `WithGet`, and `WithDelete` traits supply the default implementations
- Registered values are callables that resolve to objects on first `get()` and cache after
- `getAll()` and `getKeys()` let you walk everything in the registry without separate bookkeeping
- All three traits share the same protected `$registry` array, so you can mix and match the pieces you need

## Usage

Compose a registry by implementing the interfaces you want and using the matching traits. The class body stays empty in most cases, and the lazy resolution handled by `WithGet` keeps object construction off the hot path.

```php
<?php

use PHPNomad\Registry\Interfaces\CanDelete;
use PHPNomad\Registry\Interfaces\CanGet;
use PHPNomad\Registry\Interfaces\CanSet;
use PHPNomad\Registry\Traits\WithDelete;
use PHPNomad\Registry\Traits\WithGet;
use PHPNomad\Registry\Traits\WithSet;

class WidgetRegistry implements CanSet, CanGet, CanDelete
{
    use WithDelete;
    use WithGet;
    use WithSet;
}

$registry = new WidgetRegistry();
$registry->set('primary', fn () => new Widget('primary'));

$widget = $registry->get('primary');
```

The callable passed to `set()` runs once on the first matching `get()` call. Later reads return the cached instance, and `delete()` drops the entry so the next registration starts fresh.

## Documentation

For the broader PHPNomad framework and how its pieces fit together, see [phpnomad.com](https://phpnomad.com).

## License

MIT. See [LICENSE.txt](LICENSE.txt).
