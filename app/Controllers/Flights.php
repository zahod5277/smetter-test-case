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
}