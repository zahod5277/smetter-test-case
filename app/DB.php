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
            echo "Не удалось подключиться к MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
            return false;
        }
        mysqli_set_charset($db, 'UTF8');
        return $db;
    }
}