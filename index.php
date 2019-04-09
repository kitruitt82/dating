<?php

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();

//Define a default root
$f3->route('GET /', function()
{
    $view = new Template();
    echo $view->render
    ('views/home.html');
}
);


//Run Fat-free
$f3->run();


