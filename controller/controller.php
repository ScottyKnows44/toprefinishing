<?php


class controller
{
    private $_f3;
    private $_database;

    public function __construct($f3, $database)
    {
        $this->_f3 = $f3;
        $this->_database = $database;
    }

    public function home()
    {
        $view = new Template();
        echo $view->render('views/home.php');
    }

    public function admin()
    {
        $view = new Template();
        echo $view->render('views/admin.html');
    }

    public function clients()
    {
        $view = new Template();
        echo $view->render('views/clients.html');
    }

    public function services()
    {
        $connect = $this->_database->connect();
        $this->_database->addService($connect);

        $view = new Template();
        echo $view->render('views/services.html');
    }


}