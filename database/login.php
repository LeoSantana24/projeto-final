<?php

$email = ""; 
$password = "";
$submit = "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "projeto";

$connection = new mysqli($servername, $username, $password, $database);

// Iniciar sessão
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  // Login
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Prepare statement para evitar SQL Injection
  $stmt = $connection->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if (mysqli_num_rows($result) === 0 || !password_verify($password, ($row = $result->fetch_assoc())['password'])) {
    header('Location: ../sistema.php'); 
    exit(); 
  } else {
    $_SESSION['email'] = $email;
    header('Location: ../sistema.php');
  }

  $stmt->close();
  $connection->close(); // Fechar a conexão com o banco
}

?>

