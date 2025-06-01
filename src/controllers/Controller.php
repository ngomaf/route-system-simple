<?php

namespace Ngomafortuna\RouteSystemSimple\Controllers;

use Ngomafortuna\RouteSystemSimple\Views\View;


class Controller
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View;
    }
}
