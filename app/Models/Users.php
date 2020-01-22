<?php
namespace App\Models;
use \App\Model;

class Users extends Model{
    public function create_user($name,$passport){
        $db = $this->DB->connect();
        if ($db){
            $query = "INSERT INTO `users` (`id`, `user_name`, `passport`) VALUES (NULL, '{$name}', '{$passport}')";
            echo $query;
            $res = $db->query($query);
            if ($res){
                $user_id = $this->getObject('users', "`user_name` = '{$name}' AND `passport` = '{$passport}'");
                return $user_id;
            } else {
                return 'error';
            }
        } else {
            echo 'yt ghjsd';
            return $db;
        }
    }
}