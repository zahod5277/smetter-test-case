<?php
namespace App\Controllers;
use App\Model;
use App\Controller;

class Flights extends Controller{
    static function get_flight_date($flight_code){
        echo $flight_code;
    }
}