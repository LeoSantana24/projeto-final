

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>


  <div class="container my-5">
    <h2>Lista de Recepcionista</h2>
    <a href="./recepcionista/create.php" class="btn btn-primary" role="button">Criar novo recepcionista</a>
    <br>
    <table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Endereço</th>
      <th>Criado em</th>
      <th>Ação</th>
    </tr>
  </thead>

  <tbody>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projeto";
    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
      die("Falha na Conexão: " . $connection->connect_error);
    }

    $sql = "SELECT * FROM `recepcionista`";
    $result = $connection->query($sql);

    if (!$result) {
      die("Query Invalida: " . $connection->error);
    }

    while ($row = $result->fetch_assoc()) {
      echo "
      <tr>
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[address]</td>
        <td>$row[create_at]</td>
        <td>
          <a href='./recepcionista/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Editar</a>
          <a href='./recepcionista/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Excluir</a>
        </td>
      </tr>
      ";
    }
    ?>
  </tbody>
</table>


 </div>
</body>
</html>