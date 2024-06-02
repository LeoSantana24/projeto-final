<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "hotelphp";

  $connection = new mysqli($servername, $username, $password, $database);


<<<<<<< HEAD
$nome_completo = "";
$email = "";
$telefone = "";
$genero = "";
$data_nascimento = "";
$pais = "";
=======
  include_once('setup.php');


  $nome = $_POST['nome_completo'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $data_nasc = $_POST['data_nascimento'];
  $genero = $_POST['genero'];
  $senha = $_POST['senha'];
 
  echo 'Senha: '.$senha;
  $password = password_hash($senha,PASSWORD_DEFAULT);
  $res = registar($nome, $email, $telefone, $genero, $data_nasc, $password);

  //print_r($res);
  
  header("location: ../registar.php?res=$res");

>>>>>>> e253e83d853b4abc22db29de7083266a1114dbab

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = $_POST["nome_completo"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $genero = $_POST["genero"];
    $data_nascimento = $_POST["data_nascimento"];
    $pais = $_POST["pais"];
    $senha = $_POST["senha"];
    $confirmarsenha = $_POST["confirmarsenha"];
}

if(empty($nome_completo)){
  $nome_completo = " É obrigatótio o nome completo";
  $error = true;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $email_error = "Formato de email inválido";
  $error = true;
}

include "database/config.php";
$dbConnection = getData();

$statement = $dbConnection->prepare("SELECT id FROM usuarios WHERE email = ?")


?>