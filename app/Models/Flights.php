<?php
namespace App\Models;
use \App\Model;

class Flights extends Model{
    public function get_flights_dates($flight_code){
        $where = "`flight` = '{$flight_code}' AND `flight_date` > NOW()";
        $res = $this->getCollection('flights_date',$where);
        return $res;
    }

    public function reserve_seat($user_id,$flight,$seat)
    {
        $reserve_id = $this->get_seat($user_id,$flight,$seat);

        if (is_null($reserve_id)){
            $query = "INSERT INTO `flights_seats` (`id`, `flight_code`, `user_id`, `seat`) VALUES (NULL, '{$flight}', '{$user_id}', '{$seat}')";
            $this->DB->query($query);
            $reserve_id = $this->get_seat($user_id,$flight,$seat);
        }
        return $reserve_id;
    }

    public function get_seat($user_id,$flight,$seat){
        $model = new Model();
        $reserve_id = $model->getObject('flights_seats', "`user_id` = '{$user_id}' AND `flight_code` = '{$flight}' AND `seat` = '{$seat}'");
        return $reserve_id;
    }
}