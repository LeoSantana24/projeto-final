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


}


?>