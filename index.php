<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');
require_once("model/Database.php");
//Instantiate the F3 Base class
$f3 = Base::instance();
$validator = new Validation();
session_start();
$database = new Database();
$controller = new controller($f3, $database, $validator);

//run $f3
$f3->route('GET|POST / ', function(){
    $GLOBALS['controller']->home();
});

$f3->route('GET /admin ', function(){
    $GLOBALS['controller']->admin();
});

$f3->route('GET /clients ', function(){
    $GLOBALS['controller']->clients();
});

$f3->route('GET /bidTable ', function(){
    $GLOBALS['controller']->allBids();
});

$f3->route('GET|POST /bid ', function(){
    $GLOBALS['controller']->bidding();
});

$f3->route('GET /thankYou ', function(){
    $GLOBALS['controller']->confirmation();
});

$f3->route('GET /services', function(){
    $GLOBALS['controller']->services();
});
$f3->route('GET|POST /login', function(){
    $GLOBALS['controller']->login();
});
$f3 ->route("GET /logout", function (){
    $GLOBALS['controller']->logout();
});
$f3-> run();