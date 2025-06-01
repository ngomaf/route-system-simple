# Route system simple
Simple route management system (Sistema simples de gerenciamento de rotas)

## Install
```shell
composer require ngomafortuna/route-system-simple

```

## Require
Necessary PHP 8.0 or more (Necessário PHP 8.0 ou superior)

## Start configuration
Create the `index.php` file in public dir or in the root dir. Copy this code:
```php

use Ngomafortuna\RouteSystemSimple\Route;

define("PATH", dirname(__FILE__, 2)); // set 1 if index file is in root dir
define("URL", $_SERVER['HTTP_HOST']);
define("VIEWS", PATH . '/path/views'); // path views dir
define("MAINDIR", PATH . '/path'); // path index file
define("MAINAME", 'App'); // App is the dir of source code (controllers end models)

require_once PATH . '/vendor/autoload.php';

(new Route)->index();

```

## Start project
in terminal access root dir end execute this command
```php
php -S localhost:8000
// or if you heve a public dir execute
php -S localhost:8000 -t public
```
In browser write `http://localhost:8000`

## Create new routes
In you dir of source code create directories `controllers`, `views`, edite file `composer.json` 
(continue)

