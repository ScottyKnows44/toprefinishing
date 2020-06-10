<?php


class Database
{
    private $_dbh;

    function __construct()
    {
        $this->connect();

    }

    function connect()
    {
        try{
            if($_SERVER['USER'] == 'sthompso'){
                require '/home/sthompso/config.php';
            } else if($_SERVER['USER'] == 'tschloss'){
                require '/home/tschloss/config.php';
            } else if($_SERVER['USER'] == 'aatadina'){
                require '/home/aatadina/config.php';
            }
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            return $this->_dbh;
            //echo 'Connected to Database!';

        } catch (PDOException $e){
            echo $e->getMessage();
            return;
        }

    }

    function addService($service)
    {
        //$this->_dbh= $this->connect();
        $sql = "INSERT INTO services(serviceType) VALUES (:service)";
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam('service', $service->getServices());
        $statement->execute();
    }


    function addToBidTable($bid){
        $sql = "INSERT INTO bid(client_ID, service_ID, description, price) VALUES (:name, :service, :description, :price)";
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam('name', $bid->getName());
        $statement->bindParam('service', $bid->getService());
        $statement->bindParam('description', $bid->getDescription());
        $statement->bindParam('price', $bid->getPrice());
        $statement->execute();
    }
    function getAllBids(){
        $sql = "SELECT * FROM bids";

        $statement = $this->_dbh->prepare($sql);

        /*
        $statement->bindParam('client_id', $dbh->getName());
        $statement->bindParam('service_id', $dbh->getService());
        $statement->bindParam('price', $dbh->getPrice());
        $statement->bindParam('description', $dbh->getDescription());
            */
        $result = $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    function addClient($client){
        //$this->_dbh= $this->connect();

        $sql ="INSERT INTO client(name, phone, email, contactMethod) VALUES (:name, :phone, :email, :contactMethod)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam('name', $client->getName());
        $statement->bindParam('phone', $client->getPhone());
        $statement->bindParam('email', $client->getEmail());
        $statement->bindParam('contactMethod', $client->getContactMethod());

        $statement->execute();
    }

    function getServices()
    {
        //$this->_dbh= $this->connect();
        $sql = "SELECT * FROM services";
        $statement = $this->_dbh->prepare($sql);

        $result = $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function showClients()
    {
        //$this->_dbh= $this->connect();

        $sql = "SELECT * FROM client";
        $statement = $this->_dbh->prepare($sql);
        $result = $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}