<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');

//Instantiate the F3 Base class
$f3 = Base::instance();

//run $f3
$f3->route('GET / ', function(){
    $view = new Template();
    echo $view->render('views/home.php');
});

$f3->route('GET /admin ', function(){
    $view = new Template();
    echo $view->render('views/admin.html');
});

$f3->route('GET /clients ', function(){
    $view = new Template();
    echo $view->render('views/clients.html');
});

$f3->route('GET /services', function(){
    $view = new Template();
    echo $view->render('views/services.html');
});


$f3-> run();