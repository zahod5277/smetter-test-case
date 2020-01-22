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
        $user_id = $user->create_user($params['name'],$params['passport']);
        $model_flights = new \App\Models\Flights();
        $reserve_code = $model_flights->reserve_seat($user_id,$params['flight'],$params['seat']);

        $message = 'Успешный резерв! Ваш ID резерва: '.$reserve_code;
        $status = 'success';

        $data = [
            'message' => $message,
            'status' => $status
        ];
        (new self)->render('chunks/reserve.info.tpl',$data);
    }
}