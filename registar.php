<?php

if(isset($_POST['submit']))
{
  
  //print_r('<br>');
  //print_r('<br>');
  //print_r('<br>');
  //print_r('Nome:' . $_POST['nome']);
  //print_r('<br>');
  //print_r('Email:' . $_POST['email']);
  //print_r('<br>');
  //print_r('Telefone:' . $_POST['telefone']);
  //print_r('<br>');
  //print_r('Sexo:' . $_POST['sexo']);
  //print_r('<br>');
  //print_r('Data de Nascimento:' . $_POST['data_nascimento']);
  //print_r('<br>');
  //print_r('Pais:' . $_POST['pais']);
  //print_r('<br>');
  //print_r('senha:' . $_POST['senha']);


  include_once('config.php');


  $nome = $_POST['nome_completo'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $sexo = $_POST['genero'];
  $data_nasc = $_POST['data_nascimento'];
  $pais = $_POST['pais']
  $senha = $_POST['senha'];
 
  


  $result = mysqli_query($conexao, "INSERT INTO usuarios(nome_completo,email,telefone,sexo,data_nasc,pais,senha)
  VALUES('$nome','$email','$telefone','$sexo','$data_nasc','$pais','$senha')");
}


?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registar - Sal Island Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  </head>
  <body>

    <?php include "includes/header.php" ?>
    
    
    <div class="wrapper">
    <form action="registar.php" method="POST">
        <h1>Registar</h1>
        <div class="input-box">
            <input type="text" name="nome_completo" id="nome_completo" placeholder="Nome Completo" required>
            <i class='bx bx-user'></i>
        </div>
        <div class="input-box">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <i class='bx bxs-envelope'></i>
        </div>
        <div class="input-box">
            <input type="tel" name="telefone" id="telefone" placeholder="Telefone" required>
            <i class="fi fi-rr-phone-call"></i>
        </div>
       
        <p>Sexo</p>
        <input type="radio" id="feminino" name="genero" value="feminino" required>
        <label for="feminino">Feminino</label>
        <input type="radio" id="masculino" name="genero" value="masculino" required>
        <label for="masculino">Masculino</label>
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" required>
        
        <div class="input-box">
            <input type="text" name="pais" id="pais" placeholder="País" required>
        
        </div>
        
        <div class="input-box">
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>
        <div class="input-box">
            <input type="password" name="confirmarsenha" id="senha" placeholder="Confirmar Senha" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>
    
        <button type="submit" name="submit" id="submit" class="btn">Registar</button>
        
    </form>
</div>


   
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>
  </body>
</html>