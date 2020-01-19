<?php
namespace App;
use App\{App,Model};
use Fenom;
class Controller{
    function __construct()
    {
        Fenom::registerAutoload();
        $this->fenom = Fenom::factory(App::config('template_path'),App::config('template_cache_path'), []);
    }

    public function Home(){
        $model = new Model();
        $flights = $model->getCollection('`flights`');
        $template = 'home.tpl';
        $data = [
            'title' => 'Главная страница',
            'flights' => $flights
        ];

        $this->render($template,$data);
    }

    public function render($template,$data){
        echo $this->fenom->fetch($template,$data);
    }



}