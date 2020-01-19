<?php
namespace App;
use App\Controller;
class Router{
    function handleRequest($req){
        $controller = new Controller();
        if (!empty($req['method'])){
            $method = $req['method'];
        } else {
            $method = '';
        }
        switch ($method){
            default:
                $controller->Home();
                break;
        }
    }
}