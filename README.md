# Golem Auth

[![Latest Stable Version](https://poser.pugx.org/golem/auth-storage-aura/v/stable.png)](https://packagist.org/packages/golem/auth-storage-aura)
[![Build Status](https://travis-ci.org/spekkionu/golem-auth-storage-aura.svg?branch=master)](https://travis-ci.org/spekkionu/golem-auth-storage-aura)
[![Code Coverage](https://scrutinizer-ci.com/g/spekkionu/golem-auth-storage-aura/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/golem-auth-storage-aura/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/spekkionu/golem-auth-storage-aura/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/golem-auth-storage-aura/?branch=master)
[![Total Downloads](https://poser.pugx.org/golem/auth-storage-aura/downloads.png)](https://packagist.org/packages/golem/auth-storage-aura)

Aura Session storage adapter for Golem Auth

## Install

Via Composer

``` bash
$ composer require golem/auth-storage-aura
```

## Usage

Follow the documentation on [Golem Auth](https://github.com/spekkionu/golem-auth) to create a user model and a user repository class.

``` php
$session_factory = new \Aura\Session\SessionFactory;
$session = $session_factory->newInstance($_COOKIE);
$segment = $session->getSegment('Golem\Auth');
$this->storage = new AuraSessionStorage($segment);
// get an instance of your user repository however you need to
$userRepository = new UserRepository($database_connection);
$auth = new \Golem\Auth($storage, $userRepository);
```

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
