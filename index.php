<?php
session_start();
/*
Kat Truitt
IT328 Assignment Dating
April 19,2019
index.php-> renders the routes functions, sessions and etc. for the dating websites
*/

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');
require_once('model/validation.php');

//create an instance of the Base class
$f3 = Base::instance();
$f3->config('config.ini');


//Define a default root
$f3->route('GET /', function()
{
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /home', function()
{
    $view = new Template();
    echo $view->render('views/home.html');

});

$f3->route('GET|POST /personal', function($f3)
{
    //if post array is not empty
    if(!empty($_POST))
    {
        //get data from form
        $fn= $_POST['fname'];
        $ln= $_POST['lname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $tel= $_POST['phone'];

        //add data to hive
        $f3->set('fname',$fn);
        $f3->set('lname',$ln);
        $f3->set('gender',$gender);
        $f3->set('age',$age);
        $f3->set('phone',$tel);

        //If data is valid
        if (validForm()) {
            $_SESSION['fname']=$fn;
            $_SESSION['lname']=$ln;
            $_SESSION['gender']=$gender;
            $_SESSION['age']=$age;
            $_SESSION['phone'] =$tel;
            $f3->reroute('/profile');
        }
    }

    $view = new Template();
    echo $view->render('views/form1.html');
});

$f3->route('GET|POST /profile', function()
{

    $view = new Template();
    echo $view->render('views/form2.html');

});

$f3->route('POST /profile', function()
{
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['genderSeeking'] = $_POST['genderSeeking'];
    $_SESSION['biography'] = $_POST['biography'];
    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('POST /interests',function()
{

    $activities=[];
    $_SESSION['interests'] = $_POST['interests'];

    if(isset($_SESSION['interests']))
    {
        $activities= $_SESSION['interests'];
    }

    $activity=implode(", " , $activities);
    $_SESSION['interests']=$activity;

    $view = new Template();
    echo $view->render('views/summary.html');
});

$f3->route('GET /confirmation', function()
{

    $view = new Template();
    echo $view->render('views/summary.html');

});
//Run Fat-free
$f3->run();