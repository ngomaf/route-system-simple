# Route system simple
Simple route management system (Sistema simples de gerenciamento de rotas)

## Install
```shell
composer require ngomafortuna/route-system-simple

```

## Require
Necessary PHP 8.0 or more (Necessário PHP 8.0 ou superior)

## Exemple
### Introdution
I will illustrate with a project with the following structure (Vou exemplificar com um projecto com a seguite extrutura):
- cacutenews
 - public
 - resources
    - library
    - views
 - src
    - controllers
    - models
    - services

### Start
Create the root directory `cacutenews`, enter the created directory and run the command `composer init` (Criar o directorio raiz `cacutenews`, entrar no directório criado e executar o comando `composer init`).

Edit the `composer.json` file, just the `prs-4` block, i.e. align `"App\\": "src/"` (Editar o arquivo `composer.json`, apenas o bloco da `prs-4` ou seja alinha `"App\\": "src/"`):
```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
},
```

Still with composer install the component `composer require ngomafortuna/route-system-simple` (Ainda com composer intalar o componete `composer require ngomafortuna/route-system-simple`).

Update composer (Actualizar o composer `composer dump-autoload`).

Create the `index.php` file in the `public` directory and paste the code (Criar o arquivo `index.php` directório `public` nele cole o código):

```php

use Ngomafortuna\RouteSystemSimple\Route;

define("PATH", dirname(__FILE__, 2)); // set 1 if index file is in root dir
define("URL", $_SERVER['HTTP_HOST']);
define("VIEWS", PATH . '/resources/views'); // path views dir
define("MAINDIR", PATH . '/src'); // path of the source code dir src
define("MAINAME", 'App'); // App is the dir of namespace, from composer.json

require_once PATH . '/vendor/autoload.php';

(new Route)->index();

```

On dir `cacutenews/vendor/ngomafortuna/route-system-simple/test/views/` copy the files `error.php`, `home.php` end `master.php`
(No directorio `cacutenews/vendor/ngomafortuna/route-system-simple/test/views/` copie os arquivos `error.php`, `home.php` e `master.php`).

Past to dir `cacutenews/resources/views/` (Cole-os no directório `cacutenews/resources/views/`).

## Start project
In terminal access root dir `cacutenews` end execute this command (No terminal acesse o directório raiz `cacutenews-` e execute o comando abaixo):
```shell

php -S localhost:8000 -t public

```
In browser write `http://localhost:8000`

Did it work? (Funcionou?)

If it doesn't work, interpret the error returned and correct it (Caso não funcione interprete o erro retornado e corrija-o).

## Create new routes
To add new routes follow these steps: (Para adicionar novas rotas siga os seguintes passos:)
1. Create the link on one of the pages or in the menu, for example (Crie o link em uma das páginas ou no menu, por exemplo):
```html
<li><a href="/notice">Notícias</a></li>
```

2. Create the route controller in `src/controllers/` with name `NoticeController.php` code for the controller (Crie o controller da rota em `src/controllers/` com nome `NoticeController.php` código para o controller):

```php
<?php

namespace App\controllers;

use Ngomafortuna\RouteSystemSimple\Controllers\Controller;


class NoticeController extends Controller
{
    private array $notices = [
        'name'=>'Desporto', 
        'slag'=>'desporto', 
        'description'=>'Descrição sobre desporto'
    ];

    public function index(): void
    {
        $this->view->render('notices', [
            'title' => 'Notícias',
            'description' => 'Saiba tudo o acontece no Caute apartir daqui.'
        ]);
    }

    public function show(string $slug): void
    {
        $slug = $slug;
        $notice = $this->notices;

        $this->view->render('notices', [
            'title' => $notice['title'],
            'description' => $notice['description']
        ]);
    }
}

```

3. Create in `cacutenews/resources/views/` the views `notices.php` and `notice.php` with content (Criar em `cacutenews/resources/views/` as views `notices.php` e `notice.php` com conteúdo):
```html
<h1><?= $title ?></h1>
<p><?= $description ?></p>
```

To create other routes, just follow the same steps (Para criar outras routas é só seguir os mesmos passos).
