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

    function addToBidTable($dbh){
        $sql ="INSERT INTO bids(client_ID, service_ID, description, price) VALUES (:name, :service, :description, :price)";
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam('price', $dbh->getPrice());
        $statement->bindParam('description', $dbh->getDescription());

        $statement->execute();
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