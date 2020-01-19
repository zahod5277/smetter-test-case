<?php

namespace App;
class App
{
    static $config = [
        'app_name' => 'SMETTER PLANE SCHEMA',
        'template_path' => 'app/templates',
        'template_cache_path' => 'app/templates/cache',
        'db_host' => 'localhost',
        'db_name' => 'smetter_airlines',
        'db_username' => 'homestead',
        'db_password' => 'secret',
    ];

    function __construct()
    {
    }

    public static function config($key)
    {
        return self::$config[$key];
    }

    function run($req)
    {
        $router = new \App\Router();
        $router->handleRequest($req);
    }
}