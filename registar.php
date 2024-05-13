<?php

if(isset($POST['submit']))
{
  print_r($POST['nome']);
  print_r($POST['email']);
  print_r($POST['telefone']);
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
            <input type="text" placeholder="Nome Completo" required>
            <i class='bx bx-user'></i>
        </div>
        <div class="input-box">
            <input type="email" placeholder="Email" required>
            <i class='bx bxs-envelope'></i>
        </div>
        <div class="input-box">
            <input type="tel" placeholder="Telefone" required>
            <i class="fi fi-rr-phone-call"></i>
        </div>
       
        <p>Sexo</p>
        <input type="radio" id="feminino" name="genero" value="feminino" required>
        <label for="feminino">Feminino</label>
        <input type="radio" id="masculino" name="genero" value="masculino" required>
        <label for="masculino">Masculino</label>
        
        <div class="input-box">
            <input type="text" placeholder="País" required>
        
        </div>
        
        <div class="input-box">
            <input type="password" placeholder="Senha" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Confirmar Senha" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>
    
        <button type="submit" class="btn">Registar</button>
        
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