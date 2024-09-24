<?php

if(isset($_POST["submit"])){
  $email = $_POST["email"];
  $password = $_POST["password"];

  require_once "setup.php";


  login($email, $password);

} else {
  header("location: ../login.php");
  exit();
}

?>

