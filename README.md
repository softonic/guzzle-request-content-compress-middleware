Guzzle request content compress middleware
=====

[![Latest Version](https://img.shields.io/github/release/softonic/guzzle-request-content-compress-middleware.svg?style=flat-square)](https://github.com/softonic/guzzle-request-content-compress-middleware/releases)
[![Software License](https://img.shields.io/badge/license-Apache%202.0-blue.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/softonic/guzzle-request-content-compress-middleware/master.svg?style=flat-square)](https://travis-ci.org/softonic/guzzle-request-content-compress-middleware)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/softonic/guzzle-request-content-compress-middleware.svg?style=flat-square)](https://scrutinizer-ci.com/g/softonic/guzzle-request-content-compress-middleware/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/softonic/guzzle-request-content-compress-middleware.svg?style=flat-square)](https://scrutinizer-ci.com/g/softonic/guzzle-request-content-compress-middleware)
[![Total Downloads](https://img.shields.io/packagist/dt/softonic/guzzle-request-content-compress-middleware.svg?style=flat-square)](https://packagist.org/packages/softonic/guzzle-request-content-compress-middleware)

This middleware adds the ability to automatically compress the content of a request

Installation
-------

Via composer:
```
composer require softonic/guzzle-request-content-compress-middleware
```

Documentation
-------

To use the Middleware push it to the handler:  

```
$stack = HandlerStack::create();
$compressMiddleware = new CompressContentRequest();
$stack->push($compressMiddleware);

$client = new Client(['handler' => $stack]);

```


Testing
-------

`softonic/guzzle-request-content-compress-middleware` has a [PHPUnit](https://phpunit.de) test suite and a coding style compliance test suite using [PHP CS Fixer](http://cs.sensiolabs.org/).

To run the tests, run the following command from the project folder.

``` bash
$ docker-compose run tests
```

To run interactively using [PsySH](http://psysh.org/):
``` bash
$ docker-compose run psysh
```

License
-------

The Apache 2.0 license. Please see [LICENSE](LICENSE) for more information.

[PSR-2]: http://www.php-fig.org/psr/psr-2/
[PSR-4]: http://www.php-fig.org/psr/psr-4/