<?php
namespace App;
use App\App;
use Fenom;
class Controller{
    function __construct()
    {
        Fenom::registerAutoload();
        $this->fenom = Fenom::factory(App::config('template_path'),App::config('template_cache_path'), []);
    }

    public function Home(){
        $template = 'home.tpl';
        $data = [
            'title' => 'Главная страница',
            'seats' => [1,5,2]
        ];

        $this->render($template,$data);
    }

    public function render($template,$data){
        echo $this->fenom->fetch($template,$data);
    }



}