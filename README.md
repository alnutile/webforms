# Webforms

** Required MySQL 5.7 or PostgreSQL to handle the JSON field **

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]



## Configuration and Installation

Publish Config


You can see your default settings in `config/webforms.php`

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require alnutile/webforms
```

## Usage

**< BETA do not use**

``` php
$skeleton = new Alnutile\Webforms();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

Make sure to setup Dusk properly see Docs and this post [https://alfrednutile.info/posts/209](https://alfrednutile.info/posts/209)

Adding now files? Run `composer dump`

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email alfrednutile@gmail.com instead of using the issue tracker.

## Credits

- [Alfred Nutile][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/alnutile/webforms.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/alnutile/webforms/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/alnutile/webforms.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/alnutile/webforms.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/alnutile/webforms.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/alnutile/webforms
[link-travis]: https://travis-ci.org/alnutile/webforms
[link-scrutinizer]: https://scrutinizer-ci.com/g/alnutile/webforms/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/alnutile/webforms
[link-downloads]: https://packagist.org/packages/alnutile/webforms
[link-author]: https://github.com/alnutile
[link-contributors]: ../../contributors
