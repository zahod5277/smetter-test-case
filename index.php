<?php
require __DIR__ . '/vendor/autoload.php';

use App\App;
$App = new App();
$req = $_REQUEST;
$App->run($req);