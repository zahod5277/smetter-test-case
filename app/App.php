<?php

namespace App;

use Fenom;

class App
{
    public $fenom;

    function __construct()
    {
    }

    function run()
    {
        Fenom::registerAutoload();
        $this->fenom = Fenom::factory('app/templates/', 'app/templates/cache/', []);
        $controller = new \App\Controller();
        echo 'This is ' . $controller->config['app_name'];
    }
}