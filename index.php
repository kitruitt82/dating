<?php
//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();


//Define a default root
$f3->route('GET/', function()
{
    //echo'<h1>HELLO WORLD</h1>';
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('POST /profile', function()
{
    //echo'<h1>HELLO WORLD</h1>';
    $view = new Template();
    echo $view->render('views/personal-information.html');
});
$f3->route('POST /profile-page', function()
{
    //echo'<h1>HELLO WORLD</h1>';
    $view = new Template();
    echo $view->render('views/profile.html');
});
/*$f3->route('POST /profile-page', function()
{
    //echo'<h1>HELLO WORLD</h1>';
    $view = new Template();
    echo $view->render('views/profile.html');
});*/
//Run Fat-free
$f3->run();