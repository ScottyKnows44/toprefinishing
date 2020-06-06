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
        if(!isset($_SESSION['loggedIn'])){
            $this->_f3->reroute("/login");
        }
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
        if(!isset($_SESSION['loggedIn'])){
            $this->_f3->reroute("/login");
        }
        $connect = $this->_database->connect();
        $result = $GLOBALS['database']->showClients($connect);
        $this->_f3->set('clients', $result);
        $view = new Template();
        echo $view->render('views/clients.html');
    }

    public function services()
    {
        if(!isset($_SESSION['loggedIn'])){
            $this->_f3->reroute("/login");
        }
        $connect = $this->_database->connect();
        $result = $GLOBALS['database']->getServices($connect);

        $this->_f3->set('services', $result);

        $view = new Template();
        echo $view->render('views/services.html');
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $correctUser ='admin';
            $correctPass='@dm1n';
            if($correctUser!=$_POST['username']){
                echo "Invalid Username";
            }
            if($correctPass!=$_POST['password']){
                echo "invalid Password";
            }
            if($correctUser=$_POST['username']&&$correctPass=$_POST['password']) {
                session_start();
                $_SESSION['loggedIn']=true;
                $this->_f3->reroute('/admin');
            }
        }
        $view = new Template();
        echo $view->render('views/login.html');
    }

    public function logout(){

        session_start();
        session_destroy();
        $this->_f3->reroute('/');

    }


}