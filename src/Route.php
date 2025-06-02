<?php

namespace Ngomafortuna\RouteSystemSimple;

class Route
{
    static function index():void
    {
        $uri = self::uri();

        if(sizeof($uri) == 1 && $uri[0] == '') {
            $ctrl = MAINAME . "\\controllers\\HomeController";
            (new $ctrl)->index();
            return;
        }

        if(file_exists(MAINDIR . '/controllers/' . ucfirst($uri[0]) . 'Controller.php') && sizeof($uri) < 3) {
            $nameCtrl = ucfirst($uri[0]) . 'Controller';
            $ctrl = MAINAME . "\\controllers\\{$nameCtrl}";

            if(sizeof($uri)==1) {
                (new $ctrl)->index();
                return;
            }

            if(method_exists($ctrl, $uri[1])) {
                (new $ctrl)->{$uri[1]}();
                return;
            }

            (new $ctrl)->show($uri[1]);
            return;
        }

        if(file_exists(MAINDIR . '/controllers/' . ucfirst($uri[0]) . 'Controller.php') && sizeof($uri) > 2) {
            $nameCtrl = ucfirst($uri[0]) . 'Controller';
            $ctrl = MAINAME . "\\controllers\\{$nameCtrl}";

            $datas = $uri;
            array_shift($datas);

            if(method_exists($ctrl, $uri[1])) {
                array_shift($datas);
                (new $ctrl)->{$uri[1]}($datas);
                return;
            }

            $ctrl = MAINAME . "\\controllers\\NotFoundController";
            (new $ctrl)->show($uri[0] . 'Controller', $uri[1]);
            return;
        }

        $ctrl = MAINAME . "\\controllers\\NotFoundController";
        (new $ctrl)->index($uri[0] . 'Controller');
    }

    static function uri():array
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        $uri = explode('/', $uri);

        return $uri;
    }
}
