<?php
session_start();
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

$f3->route('GET /personal', function()
{
    $_SESSION['personal'] = $_POST['fname'];
    //echo'<h1>HELLO WORLD</h1>';
    $view = new Template();
    echo $view->render('views/form1.html');
});
//array for state select
$f3->set('states',array('Alabama','Alaska',
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
        ));

$f3->route('POST /personal', function()
{
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
    //echo'<h1>HELLO WORLD</h1>';
    $view = new Template();
    echo $view->render('views/interests.html');
});
//Run Fat-free
$f3->run();