## media-input

![alt text](https://github.com/sudippalash/media-input/blob/master/img.jpg?raw=true)


[![Latest Version on Packagist][ico-version]][link-packagist]
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
        | Which platform you use in your application. Example: bootstrap3 or bootstrap4 or bootstrap5 or default
        | Note: you should add bootstrap platform CSS and JS library. If you use default then no need to add bootstrap CSS and JS library
        | 
        */

        'platform' => 'bootstrap3',

        /*
        |--------------------------------------------------------------------------
        | Styles Default Stack
        |--------------------------------------------------------------------------
        |
        | Styles to push in appropriate stack (required)
        | 
        */

        'styles_stack' => 'styles',

        /*
        |--------------------------------------------------------------------------
        | Scripts Default Stack
        |--------------------------------------------------------------------------
        |
        | Scripts to push in appropriate stack (required)
        | 
        */

        'scripts_stack' => 'scripts',
    ];
```

## Usage

```php
<x-media-input::image 
    uniqueId="{provide unique id if you use multiple in single page}" 
    name="{file input name}" 
    :fileUrls="['array of file url (optional)']" 
/>
```

or

```php
<x-media-input::image 
    uniqueId="{provide unique id if you use multiple in single page}" 
    name="{file input name}" 
    itemKey="id" 
    itemValue="image_url" 
    :items="[collection of object (optional)]"
/>
```



## Note
1. jquery library is required. If your project already added jquery then ignore it. 
```php
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
```

2. bootstrap css & js is required as per your platform selection from config file. If your project already added jquery then ignore it or If you select default then no need to add bootstrap.

3. If you want to use the image sortable feature then you need to include sortable js in your code before the end body tag (Optional)
```php
<script src="https://cdn.jsdelivr.net/gh/sudippalash/media-input/assets/js/Sortable.min.js"></script>
```
4. If you want to use the image preview feature then you need to include magnific-popup css in your code head tag and magnific-popup js in your code before the end body tag (Optional)
```php
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/sudippalash/media-input/assets/css/magnific-popup.css">
<script src="https://cdn.jsdelivr.net/gh/sudippalash/media-input/assets/js/jquery.magnific-popup.min.js"></script>
```

[ico-version]: https://img.shields.io/packagist/v/sudippalash/media-input?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sudippalash/media-input?style=flat-square
[link-packagist]: https://packagist.org/packages/sudippalash/media-input
[link-downloads]: https://packagist.org/packages/sudippalash/media-input
[link-author]: https://github.com/sudippalash
