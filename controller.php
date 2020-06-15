<?php

use Firebase\JWT\JWT;

require __DIR__ . '../vendor/autoload.php';

function generateKey(){
    // generate pw
    $key = "1234";
    $time=1000;
    $payload = array(
        "iat" => $time,
        "nbf" => $time*2,
    );

    $jwt = JWT::encode($payload, $key);

}



function check($token,$key)
{

    // generate pw
    //$key = "1234";
    $time=1000;
    $payload = array(
        "iat" => $time,
        "nbf" => $time*2,
    );
    try {
    JWT::decode($token, $key, array('HS256'));
        //Conect DB
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "task";

        //Connection DB
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
           //Create db
            $conn = new mysqli($servername, $username, $password);
            $sql = "CREATE DATABASE Task";
            $conn->query($sql);
        }

        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM task";
        $result = $conn->query($sql);

        if(empty($result)) {
          //create table
        $sql = "CREATE TABLE Task (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                start VARCHAR(30) NOT NULL,
                end VARCHAR(30) NOT NULL
                )   ";

            $conn->query($sql);
            $begin= date('h:i:s');
            sleep(100);
            $end= date('h:i:s');
            $sql = "INSERT INTO Task (start,end)VALUES ('".$begin."', '".$end."')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();

        }else{
            // update  table
            $begin= date('h:i:s');
            sleep(100);
            $end= date('h:i:s');
            $sql = "INSERT INTO Task (start,end)VALUES ('".$begin."', '".$end."')";
            $conn->query($sql);
            $conn->close();
            header("Location:/home.php");
        }

    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

}



?>