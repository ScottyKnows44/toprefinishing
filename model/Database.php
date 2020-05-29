<?php


class Database
{

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
            echo 'Connected to Database!';
            return $dbh;
        } catch (PDOException $e){
            echo $e->getMessage();
            return;
        }

    }

    function addService($dbh)
    {
        //adds to DB
        $sql = "INSERT INTO services(serviceType) VALUES (:service)";
        $statement = $dbh->prepare($sql);
        $service = "woodcutting";

        $statement->bindParam('service', $service);
        $statement->execute();

        //shows all from db

        $sql = "SELECT * FROM services";
        $statement = $dbh->prepare($sql);

        $result = $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row){
            echo"<p>".$row['services_ID']." - ".$row['serviceType']. "</p>";
        }




    }

}