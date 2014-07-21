slim-blade
==========

Blade is the default template engine of Laravel. The main advantage of Blade is template inheritance whilst using plain PHP. This package allows you to use Blade within the Slim Framework.

## How to Install

#### using [Composer](http://getcomposer.org/)

Create a composer.json file in your project root:
    
```json
{
    "require": {
        "clickcoder/slim-blade": "0.1.*"
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

## Authors

[Kevin Darren](https://github.com/clickcoder)

## License

MIT Public License