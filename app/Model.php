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

    public function getCollection($tablename,$where = '1'){
        $db = $this->DB->connect();
        if ($db){
            $res = $db->query("SELECT * FROM {$tablename} WHERE {$where}");
        } else {
            return $db;
        }
    }
}