<?php
namespace App\Controllers;
use App\Controller;
use App\Model;

class Users extends Controller{
    public function create_user($name,$passport)
    {
        $model = new Model();
        $user_id = $model->getObject('users', "`user_name` = '{$name}' AND `passport` = '{$passport}'");

        if (!is_null($user_id)){
            $message = 'Пользователь уже существует!';
            $status = 'danger';
        } else {
            $model_user = new \App\Models\Users();
            $user_id = $model_user->create_user($name,$passport);
            $message = 'Успешный резерв! Ваш ID резерва: '.$user_id['id'];
            $status = 'success';
        }

        $data = [
            'message' => $message,
            'status' => $status
        ];
        $this->render('chunks/reserve.info.tpl',$data);
    }
}