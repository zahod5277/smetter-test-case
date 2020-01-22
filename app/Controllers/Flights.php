<?php
namespace App\Controllers;
use App\Controller;
class Flights extends Controller{
    static function get_flight_dates($flight_code){
        if (empty($flight_code)){
            (new self)->error('Рейс не найден');
        }
        $model = new \App\Models\Flights();
        $dates = $model->get_flights_dates($flight_code);
        (new self)->render('chunks/flights.date.tpl',[
            'dates' => $dates
        ]);
    }
    static function get_flights_seats($flight_id){
        if (empty($flight_id)){
            (new self)->error('Рейс не найден');
        }
        $seats = [];
        (new self)->render('chunks/plane.seats.tpl',[
            'seats' => $seats
        ]);
    }
    static function reserve_flight_seat($params){
        $user = new Users();
        $user->create_user($params['name'],$params['passport']);
        //echo var_dump($params);
    }
}