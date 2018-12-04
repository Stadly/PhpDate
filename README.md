# PhpDate

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Augmenting the build-in PHP date functionality.

## Install

Via Composer

``` bash
$ composer require stadly/php-date
```

## Usage

``` php
use Stadly\Date\Interval;

Interval::compare(new \DateInterval('P1M'), new \DateInterval('P27D')); // 1
Interval::compare(new \DateInterval('P1M'), new \DateInterval('P30D')); // null
Interval::compare(new \DateInterval('P1M'), new \DateInterval('P32D')); // -1
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email magnar@myrtveit.com instead of using the issue tracker.

## Credits

- [Magnar Ovedal Myrtveit][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/stadly/php-date.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Stadly/PhpDate/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Stadly/PhpDate.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Stadly/PhpDate.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/stadly/php-date.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/stadly/php-date
[link-travis]: https://travis-ci.org/Stadly/PhpDate
[link-scrutinizer]: https://scrutinizer-ci.com/g/Stadly/PhpDate/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Stadly/PhpDate
[link-downloads]: https://packagist.org/packages/stadly/php-date
[link-author]: https://github.com/Stadly
[link-contributors]: ../../contributors
