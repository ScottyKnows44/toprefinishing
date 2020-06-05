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

    public function bidding()
    {
        $view = new Template();
        echo $view->render('views/biddingPage.html');
    }
    public function confirmation()
    {
        $view = new Template();
        echo $view->render('views/thankYouPage.html');
    }

    public function clients()
    {
        $connect = $this->_database->connect();
        $result = $GLOBALS['database']->showClients($connect);
        $this->_f3->set('clients', $result);
        $view = new Template();
        echo $view->render('views/clients.html');
    }

    public function services()
    {

        $connect = $this->_database->connect();
        $result = $GLOBALS['database']->getServices($connect);

        $this->_f3->set('services', $result);

        $view = new Template();
        echo $view->render('views/services.html');
    }


}