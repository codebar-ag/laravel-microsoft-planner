<img src="https://banners.beyondco.de/Laravel%20Microsoft%20Planner.png?theme=light&packageManager=composer+require&packageName=codebar-ag%2Flaravel-microsoft-planner&pattern=circuitBoard&style=style_1&description=An+opinionated+way+to+interface+with+Microsoft+Planner&md=1&showWatermark=0&fontSize=175px&images=document-report">

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codebar-ag/laravel-microsoft-planner.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-microsoft-planner)
[![GitHub-Tests](https://github.com/codebar-ag/laravel-microsoft-planner/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/codebar-ag/laravel-microsoft-planner/actions/workflows/run-tests.yml)
[![GitHub Code Style](https://github.com/codebar-ag/laravel-microsoft-planner/actions/workflows/fix-php-code-style-issues.yml/badge.svg?branch=main)](https://github.com/codebar-ag/laravel-microsoft-planner/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/codebar-ag/laravel-microsoft-planner.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-microsoft-planner)

This package was developed to interface with Microsoft Planner.

## 💡 What is Laravel Microsoft Planner?
/
Laravel Microsoft Planner is an opinionated way to interface with Microsoft Planner.


## 🛠 Requirements

### <= v1.0

- PHP: `^8.2`
- Laravel: `^10.*`

## ⚙️ Installation

You can install the package via composer:

```bash
composer require codebar-ag/laravel-microsoft-planner
```

Add the following environment variables to your `.env` file:

```bash
MICROSOFT_PLANNER_CLIENT_ID=your-client-id
MICROSOFT_PLANNER_TENANT_ID=your-tenant-id
MICROSOFT_PLANNER_CLIENT_SECRET=your-client-secret
```


## 🔧 Configuration file

You can publish the config file with:

```bash
php artisan vendor:publish --tag=microsoft-planner-config
```

This is the contents of the published config file:

```php
<?php

// config for CodebarAg/LaravelMicrosoftPlanner

return [
    'auth' => [
        'client_id' => env('MICROSOFT_PLANNER_CLIENT_ID'),
        'client_secret' => env('MICROSOFT_PLANNER_CLIENT_SECRET'),
        'tenant_id' => env('MICROSOFT_PLANNER_TENANT_ID'),
        'redirect_uri' => env('MICROSOFT_PLANNER_REDIRECT_URI'),
    ]
];
```

## 🚧 Testing

Copy your own phpunit.xml-file.

```bash
cp phpunit.xml.dist phpunit.xml
```

Run the tests:

```bash
./vendor/bin/pest
```

## 📝 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## ✏️ Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## 🧑‍💻 Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## 🙏 Credits

- [Rhys Lees](https://github.com/RhysLees)
- [All Contributors](../../contributors)
- [Skeleton Repository from Spatie](https://github.com/spatie/package-skeleton-laravel)
- [Laravel Package Training from Spatie](https://spatie.be/videos/laravel-package-training)

## 🎭 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
