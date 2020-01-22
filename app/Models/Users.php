<?php

namespace App\Models;

use \App\Model;

class Users extends Model
{
    public function create_user($name, $passport)
    {
        $query = "INSERT INTO `users` (`id`, `user_name`, `passport`) VALUES (NULL, '{$name}', '{$passport}')";
        $res = $this->DB->query($query);
        if ($res){
            $user_id = $this->getObject('users', "`user_name` = '{$name}' AND `passport` = '{$passport}'");
        }
        return $user_id;
    }
}