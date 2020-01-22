<?php
namespace App\Controllers;
use App\Controller;
use App\Model;

class Users extends Controller{
    public function create_user($name,$passport)
    {
        $model = new Model();
        $user_id = $model->getObject('users', "`user_name` = '{$name}' AND `passport` = '{$passport}'");

        if (is_null($user_id)){
            $model_user = new \App\Models\Users();
            $user_id = $model_user->create_user($name,$passport);
        }
        return $user_id['id'];
    }
}