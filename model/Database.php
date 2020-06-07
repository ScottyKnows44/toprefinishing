<?php


class Database
{
    private $_dbh;

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
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo 'Connected to Database!';
            return $dbh;
        } catch (PDOException $e){
            echo $e->getMessage();
            return;
        }

    }

    function addService($dbh, $service)
    {
        $sql = "INSERT INTO services(serviceType) VALUES (:service)";
        $statement = $dbh->prepare($sql);

        $statement->bindParam('service', $service);
        $statement->execute();
    }

    function addToBidTable($dbh){
        $sql ="INSERT INTO bids(client_ID, service_ID, description, price) VALUES (:name, :service, :description, :price)";
        $statement = $dbh->prepare($sql);

        $statement->bindParam('price', $dbh->getPrice());
        $statement->bindParam('description', $dbh->getDescription());

        $statement->execute();
    }

    function addClient($dbh){
        $sql ="INSERT INTO client(name, phone, email, contactMethod) VALUES (:name, :phone, :email, :contactMethod)";

        $statement = $dbh->prepare($sql);

        $statement->bindParam('name', $dbh->getName());
        $statement->bindParam('phone', $dbh->getPhone());
        $statement->bindParam('email', $dbh->getEmail());
        $statement->bindParam('contactMethod', $dbh->getContactMethod());

        $statement->execute();
    }

    function getServices($dbh)
    {
        $sql = "SELECT * FROM services";
        $statement = $dbh->prepare($sql);

        $result = $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function showClients($dbh)
    {
        $sql = "SELECT * FROM client";
        $statement = $dbh->prepare($sql);
        $result = $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateClient($dbh, $id, $name, $phone, $email, $contactMethod){
        $sql = "UPDATE clients
                SET name = '$name',  phone = '$phone', email = '$email', phone = '$phone', contactMethod = '$contactMethod'
                WHERE client_ID ='$id'";

        $statement = $dbh->prepare($sql);
        $result = $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}