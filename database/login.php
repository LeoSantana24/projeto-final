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
        include_once('conexao.php');


        $email = $_POST['email'];
        $password = $_POST['password'];

        //print_r('Email: '. $email);
        //print_r(<br>);
        //print_r('Senha: '. $senha);

<<<<<<< HEAD
        $sql = "SELECT *FROM usuarios WHERE email = '$email' and password = '$password'";

        $result = $connection->query($sql);
=======
        $sql = "SELECT *FROM usuarios WHERE email = '$email' ";
        $result = $conn->query($sql);
        
>>>>>>> e253e83d853b4abc22db29de7083266a1114dbab

         if(mysqli_num_rows($result) < 1)
        {
            header('Location: ../login.php?login=erro');

        }
        else
        {
<<<<<<< HEAD
           session_start();
           $_SESSION['email'] = $email;
           $_SESSION['password']= $password;
           header('Location: ../sistema.php');
        }
=======
            
            $row = mysqli_fetch_assoc($result);
            if(password_verify($senha, $row['senha'])){

                session_start();

                $_SESSION['email'] = $email;
                $_SESSION['senha']= $senha;
                header('Location: ../sistema.php');
            } else {
                header('Location: ../login.php?login=dadosinvalidos');
            }
           
        } 
>>>>>>> e253e83d853b4abc22db29de7083266a1114dbab
    }
    else
    {
        //Não acessa
        header('Location: login.php');
    }

?>