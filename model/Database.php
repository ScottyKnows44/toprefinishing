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

}