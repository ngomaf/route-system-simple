<?php

namespace Ngomafortuna\RouteSystemSimple\Controllers;

use Ngomafortuna\RouteSystemSimple\Controllers\Controller;


class HomeController extends Controller
{
    public function index():void {

        $this->view->render('home', [
            'title' => 'Home page',
            'description' => 'This is the home page.'
        ]);
        
    }
}