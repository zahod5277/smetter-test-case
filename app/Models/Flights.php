<?php
namespace App\Models;
use \App\Model;

class Flights extends Model{
    public function get_flights_dates($flight_code){
        return 'Elone Musk flyght on '.$flight_code;
    }
}