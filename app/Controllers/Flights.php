<?php
namespace App\Controllers;
use App\Controller;
use App\Model;

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

        $seats = (new Model())->getCollection('flights_seats',"`flight_code` = '{$flight_id}'");
        (new self)->render('chunks/plane.seats.tpl',[
            'seats' => $seats
        ]);
    }

    static function flight_seat_info($params){
        $model = new Model();
        $seat = $model->getObject("flights_seats","`flight_code` = '{$params['flight']}' AND `seat` = '{$params['seat']}'");
        $user_id = $model->getObject('users',"`id` = '{$seat['user_id']}'");

        $message = 'Место занято: '.$user_id['user_name'];
        $status = 'warning';

        $data = [
            'message' => $message,
            'status' => $status
        ];
        (new self)->render('chunks/reserve.info.tpl',$data);
    }

    static function reserve_flight_seat($params){
        $user = new Users();
        $user_id = $user->create_user($params['name'],$params['passport']);
        $model_flights = new \App\Models\Flights();
        $reserve_code = $model_flights->reserve_seat($user_id,$params['flight'],$params['seat']);

        $message = 'Успешный резерв! Ваш ID резерва: '.$params['flight'].'/'.$params['seat'].'/'.$reserve_code;
        $status = 'success';

        $data = [
            'message' => $message,
            'status' => $status
        ];
        (new self)->render('chunks/reserve.info.tpl',$data);
    }
}