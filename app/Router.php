<?php
namespace App;
use App\Controller;

class Router{

    static $rules = [
        "get/flights/dates" => 'Flights::get_flight_dates',
    ];

    public $namespace = '\\App\\Controllers\\';

    function handleRequest($req = ['api' => '', 'params' => '']){
        if (empty($req)){
            $controller = new Controller();
            $controller->Home();
            exit();
        }
        foreach (self::$rules as $rule){
            if (strcasecmp($rule, $req['api'])) {
                call_user_func($this->namespace . self::$rules[$req['api']],$req['params']);
            }
        }
    }
}