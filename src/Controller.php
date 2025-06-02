<?php

namespace Ngomafortuna\RouteSystemSimple;

use Ngomafortuna\RouteSystemSimple\View;


class Controller
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View;
    }
}
