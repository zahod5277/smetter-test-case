<?php
namespace App\Models;
use \App\Model;

class Flights extends Model{
    public function get_flights_dates($flight_code){
        $where = "`flight` = '{$flight_code}' AND `flight_date` > NOW()";
        $res = $this->getCollection('flights_date',$where);
        return $res;
    }
}