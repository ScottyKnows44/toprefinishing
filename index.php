<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');
require_once("model/Database.php");
//Instantiate the F3 Base class
$f3 = Base::instance();

$database = new Database();
$controller = new controller($f3, $database);

//run $f3
$f3->route('GET / ', function(){
    $GLOBALS['controller']->home();
});

$f3->route('GET /admin ', function(){
    $GLOBALS['controller']->admin();
});

$f3->route('GET /clients ', function(){
    $GLOBALS['controller']->clients();
});

$f3->route('GET /services', function(){
    $GLOBALS['controller']->services();
});

$f3-> run();