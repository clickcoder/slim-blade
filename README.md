slim-blade
==========

Blade is the default template engine of Laravel. The main advantage of Blade is template inheritance whilst using plain PHP. This package allows you to use Blade within the Slim Framework.

## How to Install

#### using [Composer](http://getcomposer.org/)

The package can be installed via Composer by requiring the "clickcoder/slim-blade": "dev-master" package in your project's composer.json.
    
```json
{
    "require": {
        "clickcoder/slim-blade": "dev-master"
    }
}
```

Then run the following composer command:

```bash
$ php composer.phar install
```

## Blade

### How to use
    
```php
<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Blade()
));
```

To use Blade cache do the following:
    
```php
$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache'
);
```

You can use all blade features as described in the Laravel 4 documentation: http://laravel.com/docs/templates#blade-templating

## Authors

[Kevin Darren](https://github.com/clickcoder)

## License

MIT Public License