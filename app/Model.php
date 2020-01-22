<?php

namespace App;

use App\{App, DB};

class Model
{
    public $DB;

    function __construct()
    {
        $this->DB = new DB();
    }

    public function getCollection($tablename, $where = '1')
    {
        $query = "SELECT * FROM {$tablename} WHERE {$where}";
        $res = $this->DB->query($query);
        $output = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $output;
    }

    public function getObject($tablename, $where = '1')
    {
        $query = "SELECT * FROM `{$tablename}` WHERE {$where}";
        $res = $this->DB->query($query);
        $output = $res->fetch_assoc();
        return $output;
    }
}