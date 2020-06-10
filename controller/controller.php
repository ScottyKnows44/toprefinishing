<?php


class controller
{
    private $_f3;
    private $_database;
    private $_validator;

    public function __construct($f3, $database, $validator)
    {
        $this->_f3 = $f3;
        $this->_database = $database;
        $this->_validator = $validator;
    }

    public function home()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //set one call
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $contact=$_POST['contact'];
            $services=$_POST['services'];
            //set sticky
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            $_SESSION['phone']=$phone;
            $_SESSION['contact']=$contact;

            if(!empty($services)){
                $_SESSION['services']=$services;

                $bid=true;

            }
            if(empty($name) || !$this->_validator->validName($name)){
                $this->_f3->set('errors["name"]', "Please type in your name");
            }
            if(empty($email) || !$this->_validator->ValidEmail($email)){
                $this->_f3->set('errors["email"]', "Please type a valid email");
            }
            if(empty($phone) || !$this->_validator->validPhone($phone)){
                $this->_f3->set('errors["phone"]', "Please type a valid phone number");
            }
            if(empty($this->_f3->get('errors'))){

                if(isset($bid)){
                    $_SESSION['form']= new Bid($name,$email,$phone,$contact, $services);
                    $this->_f3->reroute('/bid');
                }
                else{
                    $_SESSION['form'] = new Client($name,$email,$phone,$contact, $services);
                    $this->_f3->reroute('/thankYou');
                }
            }
        }
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
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(!empty($_POST['description'])){
                $_SESSION['form']->setDescription($_POST['description']);
            }
            if(!empty($_POST['price'])){
                $_SESSION['form']->setPrice($_POST['price']);
            }

            $this->_f3->reroute("/thankYou");

        }
        $view = new Template();
        echo $view->render('views/biddingPage.html');
    }
    public function confirmation()
    {
        if($_SESSION['form'] instanceof Bid){
            $connect = $this->_database->connect();
            $GLOBALS['database']->addClient($_SESSION['form']);
        } else{
            $connect = $this->_database->connect();
            $GLOBALS['database']->addClient($_SESSION['form']);
        }

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
    public function allBids()
    {
        $result = $GLOBALS['database']->getAllBids();
        $this->_f3->set('bids', $result);
        $view = new Template();
        echo $view->render('views/adminBidPage.html');
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