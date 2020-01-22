<?php

namespace App;

use App\App;
use mysqli;
class DB
{
    function connect()
    {
        $db = new mysqli(
            App::config('db_host'),
            App::config('db_username'),
            App::config('db_password'),
            App::config('db_name')
        );
        if ( $db->connect_errno ) {
            throw new \Exception('Невозможно подключиться к БД');
        }
        mysqli_set_charset($db, 'UTF8');
        return $db;
    }

    function query($query){
        $db = $this->connect();
        $result = $db->query($query);
        if (!$result){
            throw new \Exception('Ошибка выполнения SQL запроса, проверьте запрос.');
        }
        return $result;
    }
}