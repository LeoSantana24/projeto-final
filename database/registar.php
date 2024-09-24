<?php


if(isset($_POST["submit"])){
  $nome_completo = $_POST["nome_completo"];
  $email = $_POST["email"];
  $telefone = $_POST["telefone"];
  $senha = $_POST["senha"];
  $confirmarsenha = $_POST["confirmarsenha"];

  require_once "setup.php";

  if($senha != $confirmarsenha){
    header("location: ../registar.php?valid=false");
    exit();
  } 

  inserirCliente($nome_completo, $email, $telefone, $senha);

} else {
  header("location: ../registar.php");
  exit();
}

?>