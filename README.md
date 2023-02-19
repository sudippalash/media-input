## media-input

![alt text](https://github.com/sudippalash/media-input/blob/master/img.jpg?raw=true)


[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]


This package provides a set of blade components


## Install

Via Composer

```bash
composer require sudippalash/media-input
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Sudip\MediaInput\Providers\AppServiceProvider" --tag=config
```

You can publish the lang file with:

```bash
php artisan vendor:publish --provider="Sudip\MediaInput\Providers\AppServiceProvider" --tag=lang
```

You can publish blade files with:

```bash
php artisan vendor:publish --provider="Sudip\MediaInput\Providers\AppServiceProvider" --tag=views
```

In `config/media-input.php` config file you should set your data.

```php
    return [
        /*
        |--------------------------------------------------------------------------
        | Platform
        |--------------------------------------------------------------------------
        |
        | Which platform you use in your application. Example: bootstrap3 or bootstrap4 or bootstrap5
        | Note: you should add platform CSS and JS library
        | 
        */

        'platform' => 'bootstrap3',

        /*
        |--------------------------------------------------------------------------
        | Styles Default Stack
        |--------------------------------------------------------------------------
        |
        | Styles to push in appropriate stack
        | 
        */

        'styles_stack' => 'styles',

        /*
        |--------------------------------------------------------------------------
        | Scripts Default Stack
        |--------------------------------------------------------------------------
        |
        | Scripts to push in appropriate stack
        | 
        */

        'scripts_stack' => 'scripts',
    ];
```

## Usage

```php
<x-media-input::image uniqueId="{provide unique id if you use multiple in single page}" name="{file input name}" :fileUrls="['array of file url (optional)']" />
```

## License

<!-- The MIT License (MIT). Please see [License File](LICENSE.md) for more information. -->

[ico-version]: https://img.shields.io/packagist/v/sudippalash/blade-components?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sudippalash/blade-components?style=flat-square
[ico-license]: https://img.shields.io/github/license/sudippalash/blade-components?style=flat-square
[link-packagist]: https://packagist.org/packages/sudippalash/blade-components
[link-downloads]: https://packagist.org/packages/sudippalash/blade-components
[link-author]: https://github.com/sudippalash
