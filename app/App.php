<?php

namespace App;

class App
{
    function run($req)
    {
        $router = new \App\Router();
        $router->handleRequest($req);
    }
}