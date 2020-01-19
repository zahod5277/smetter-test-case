<?php
namespace App;
use Fenom;
class Controller{
    public $config = [];
    function __construct()
    {
        $this->config = [
            'app_name' => 'SMETTER PLANE SCHEMA',
            'template_path' => 'app/templates',
            'template_cache_path' => 'app/templates/cache'
        ];

        Fenom::registerAutoload();
        $this->fenom = Fenom::factory($this->config['template_path'],$this->config['template_cache_path'], []);
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