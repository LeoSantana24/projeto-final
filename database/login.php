<?php

    //print_r($REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        //Acessa
        include_once('conexao.php');


        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //print_r('Email: '. $email);
        //print_r(<br>);
        //print_r('Senha: '. $senha);

        $sql = "SELECT *FROM usuarios WHERE email = '$email' ";
        $result = $conn->query($sql);
        

         if(mysqli_num_rows($result) < 1)
        {
            header('Location: ../login.php?login=erro');

        }
        else
        {
            
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
    }
    else
    {
        //Não acessa
        header('Location: login.php');
    }

?>