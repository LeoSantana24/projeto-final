<?php
    function getData(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cadastro";


        $connection = new mysqli($servername, $username, $password, $database);
        if($connection->connect_errno){
            die("ERROR to mysql" . $connection->connect_errno);
        }
        return $connection;
    }

?>