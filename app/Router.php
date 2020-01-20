<?php
namespace App;
use App\Controller;

class Router{

    static $rules = [
        "get/flights/date" => 'Flights::get_flight_date',
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
                call_user_func($this->namespace . self::$rules[$req['api']],'');
            }
        }
    }
}