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

        $sql = "INSERT INTO services(serviceType) VALUES (:service)";
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam('service', $service->getServices());
        $statement->execute();
    }


    function addToBidTable($bid, $id){

        //get the id of the requested service
        $sql = "select service_ID FROM services where serviceType = :type";
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam('type', $bid->getService());

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        //prepare to insert new bid
        $sql = "INSERT INTO bids(client_ID, service_ID, description, price) VALUES (:name, :service, :description, :price)";
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam('name', $id, PDO::PARAM_INT);
        $statement->bindParam('service', $result, PDO::PARAM_INT);
        $statement->bindParam('description', $bid->getDescription(), PDO::PARAM_STR);
        $statement->bindParam('price', $bid->getPrice(), PDO::PARAM_INT);

        $statement->execute();

    }

    function getClientsBid(){
        $sql = "SELECT * FROM bids WHERE client_ID = :type";

        $statement = $this->_dbh->prepare($sql);

        $result = $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    function addClient($client){


        $sql ="INSERT INTO client(name, phone, email, contactMethod, service) VALUES (:name, :phone, :email, :contactMethod, :serviceSelected)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam('name', $client->getName(), PDO::PARAM_STR);
        $statement->bindParam('phone', $client->getPhone());
        $statement->bindParam('email', $client->getEmail(), PDO::PARAM_STR);
        $statement->bindParam('contactMethod', $client->getContactMethod(), PDO::PARAM_STR);
        $statement->bindParam('serviceSelected', $client->getService(), PDO::PARAM_STR);

        $statement->execute();

        $statement = $this->_dbh->prepare("SELECT Auto_increment FROM information_schema.tables WHERE table_name='client'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC)['Auto_increment']-1;
    }

    function getServices()
    {

        $sql = "SELECT * FROM services";
        $statement = $this->_dbh->prepare($sql);

        $result = $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function showClients()
    {
        $sql = "SELECT * FROM client";
        $statement = $this->_dbh->prepare($sql);
        $result = $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}