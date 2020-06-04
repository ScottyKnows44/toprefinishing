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

    function addService($dbh)
    {
        $sql = "INSERT INTO services(serviceType) VALUES (:service)";
        $statement = $dbh->prepare($sql);
        $service = "woodcutting";
        $statement->bindParam('service', $service);
        $statement->execute();
    }

    function addClient($dbh){
        $sql ="INSERT INTO client(name, phone, email, contactMethod) VALUES (:name, :phone, :email, :contactMethod)";
        $statement = $dbh->prepare($sql);
        $name = "Billy Bob";
        $phone = "253-123-1234";
        $email = "Fakeemailsd@jaiu.com";
        $contactMethod = "email";

        $statement->bindParam('name', $name);
        $statement->bindParam('phone', $phone);
        $statement->bindParam('email', $email);
        $statement->bindParam('contactMethod', $contactMethod);

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