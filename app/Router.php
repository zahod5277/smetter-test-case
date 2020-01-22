<?php
namespace App;
use App\Controller;

class Router{

    static $rules = [
        "get/flights/dates" => 'Flights::get_flight_dates',
        "get/flights/seats" => 'Flights::get_flights_seats',
        "put/flight/seat" => 'Flights::reserve_flight_seat'
    ];

    public $namespace = '\\App\\Controllers\\';

    function handleRequest($req = ['api' => '', 'params' => '']){
        if (empty($req)){
            $controller = new Controller();
            $controller->Home();
            exit();
        }
        $rules = self::$rules;
        foreach ($rules as $rule){
            if (strcasecmp($rule, $req['api'])) {
                call_user_func($this->namespace . self::$rules[$req['api']],$req['params']);
                break;
            }
        }
    }
}