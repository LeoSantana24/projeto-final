<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hotelphp";

    $connection = new mysqli($servername, $username, $password, $database);
    //print_r($REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        //Acessa
        include_once('config.php');


        $email = $_POST['email'];
        $password = $_POST['password'];

        //print_r('Email: '. $email);
        //print_r(<br>);
        //print_r('Senha: '. $senha);

        $sql = "SELECT *FROM usuarios WHERE email = '$email' and password = '$password'";

        $result = $connection->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            header('Location: ../login.php?login=erro');

        }
        else
        {
           session_start();
           $_SESSION['email'] = $email;
           $_SESSION['password']= $password;
           header('Location: ../sistema.php');
        }
    }
    else
    {
        //Não acessa
        header('Location: login.php');
    }

?>