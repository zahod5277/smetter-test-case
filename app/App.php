<?php

namespace App;

class App
{
    public $fenom;

    function __construct()
    {
    }

    function run($req)
    {
        $router = new \App\Router();
        $router->handleRequest($req);
    }
}