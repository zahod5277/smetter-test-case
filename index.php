<?php
require __DIR__ . '/vendor/autoload.php';
$controller = new \App\Controller();
echo 'This is '.$controller->config['app_name'];

