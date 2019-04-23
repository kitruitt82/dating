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

//create an instance of the Base class
$f3 = Base::instance();



//Define a default root
$f3->route('GET /', function()
{
    //echo'<h1>HELLO WORLD</h1>';
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /home', function()
{
    $view = new Template();
    echo $view->render('views/home.html');

});

$f3->route('GET /personal', function()
{
    //echo'<h1>HELLO WORLD</h1>';
    $view = new Template();
    echo $view->render('views/form1.html');
});
//array for state select
$states=array('Alabama','Alaska',
            'Arizona',
            'Arkansas',
            'California',
            'Colorado',
            'Connecticut',
            'Delaware',
            'District of Columbia',
            'Florida',
            'Georgia',
            'Hawaii',
            'Idaho',
            'Illinois',
            'Indiana',
            'Iowa',
            'Kansas',
            'Kentucky',
            'Louisiana',
            'Maine',
            'Maryland',
            'Massachusetts',
            'Michigan',
            'Minnesota',
            'Mississippi',
            'Missouri',
            'Montana',
            'Nebraska',
            'Nevada',
            'New Hampshire',
            'New Jersey',
            'New Mexico',
            'New York',
            'North Carolina',
            'North Dakota',
            'Ohio',
            'Oklahoma',
            'Oregon',
            'Pennsylvania',
            'Rhode Island',
            'South Carolina',
            'South Dakota',
            'Tennessee',
            'Texas',
            'Utah',
            'Vermont',
            'Virginia',
            'Washington',
            'West Virginia',
            'Wisconsin',
            'Wyoming'
        );
$f3->set('states',$states);

$f3->route('POST /personal', function()
{
    //include('model/validation.php');
    $_SESSION['fname'] = $_POST['fname'] ;
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['phone'] = $_POST['phone'];
    //echo'<h1>HELLO WORLD</h1>';
    $view = new Template();
    echo $view->render('views/form2.html');

});

//array for indoor interests
$f3->set('indoor',array(
    'tv','movies','cooking','board games','puzzles','reading','playing cards','video games'));

$f3->set('outdoor',array('hiking','biking','swimming','collecting','walking','climbing'));


$f3->route('POST /profile', function()
{
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['states'] = $_POST['states'];
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