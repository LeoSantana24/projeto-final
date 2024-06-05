<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "hotelphp";

$connection = new mysqli($servername, $username, $password, $database);

$email = "";
$password = "";
$error = "";

// Verificar se existe sessão ativa (opcional)
if (isset($_SESSION["email"])) {
  header("location: /index.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email) || empty($password)) {
    $error = "Email e Senha obrigatórios!";
  } else {
    // Verificar login no banco de dados (implemente a consulta SQL)
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['senha'])) {
        // Login bem-sucedido
        $_SESSION['email'] = $email; // Iniciar sessão
        header("location: /sistema.php"); // Redirecionar para página específica
        exit;
      } else {
        $error = "Email ou Senha incorretos!";
      }
    } else {
      $error = "Email ou Senha incorretos!";
    }

    $stmt->close();
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login de Usuario</title>
</head>
<body>
    
<form style="width: 50%; margin: 0 auto; margin-top: 10rem; display:block;" method="post">
  <!-- Email input -->
  <h1>Login de Usuario</h1>
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" value="<?php $email ?>"/>
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" value="<?php $password ?>" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31"  />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
   
  </div>
</form>
</body>
</html>