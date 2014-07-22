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
    'view' => new \Slim\Views\Blade(),
	'templates.path' => './templates',
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

### Example

Create the following index.php file

```php
<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Blade(),
	'templates.path' => './templates',
));

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache'
);

$app->get('/hello/:name', function ($name) use ($app) {
	$app->render('master', array(
		'variable' =>  "Hello, $name"
	));
});

$app->run();
```

Create a `templates` folder and add this inside

```php
<!DOCTYPE html>
<html lang="en">
    <body>
		{{ $variable }}
    </body>
</html>
```

visit /index.php/hello/world

## Authors

[Kevin Darren](https://github.com/clickcoder)

## License

MIT Public License