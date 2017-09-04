# Laravel Helper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/elfsundae/laravel-helper.svg?style=flat-square)](https://packagist.org/packages/elfsundae/laravel-helper)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/ElfSundae/laravel-helper/master.svg?style=flat-square)](https://travis-ci.org/ElfSundae/laravel-helper)
[![StyleCI](https://styleci.io/repos/94307071/shield)](https://styleci.io/repos/94307071)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/81457d2a-754f-44b7-b66e-10049e4f9804.svg?style=flat-square)](https://insight.sensiolabs.com/projects/81457d2a-754f-44b7-b66e-10049e4f9804)
[![Quality Score](https://img.shields.io/scrutinizer/g/elfsundae/laravel-helper.svg?style=flat-square)](https://scrutinizer-ci.com/g/elfsundae/laravel-helper)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/elfsundae/laravel-helper/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/elfsundae/laravel-helper/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/elfsundae/laravel-helper.svg?style=flat-square)](https://packagist.org/packages/elfsundae/laravel-helper)

## Installation

You can install this package via the [Composer](https://getcomposer.org) manager:

```sh
$ composer require elfsundae/laravel-helper
```

## Available Global Functions

|                     Function                    |                                  Description                                  |
|-------------------------------------------------|-------------------------------------------------------------------------------|
| `urlsafe_base64_encode($data)`                  | URL-safe `base64_encode`                                                      |
| `urlsafe_base64_decode($data, $strict = false)` | URL-safe `base64_decode`                                                      |
| `mb_trim($string)`                              | `trim` with mbstring support                                                  |
| `string_value($value, $jsonOptions = 0)`        | Converts any type to a string                                                 |
| `in_arrayi($needle, $haystack)`                 | Case-insensitive `in_array`                                                   |
| `active()`                                      | Returns string 'active' if the current request URI matches the given patterns |
| `asset_from($root, $path = '', $secure = null)` | Generate the URL to an asset from a custom root domain such as CDN, etc       |

## Testing

```sh
$ composer test
```

## License

This package is open-sourced software licensed under the [MIT License](LICENSE.md).
