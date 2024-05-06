<?php
    $hostname="localhost";
    $dbname="crudphp";
    $username="root";
    $password="";

    try{

        $conn = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);

        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        
        //     echo "Connected Successfully!";
       


    }catch(PDOException $e){

        echo "Connection fail".$e->getMessage();

    }

?>