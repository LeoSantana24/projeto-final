<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projeto";

$connection = new mysqli($servername, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $reserva_id = $_POST["reserva_id"];

  $sql = "SELECT * FROM reservas WHERE id = ?";
  $stmt = $connection->prepare($sql);


  $stmt->bind_param("i", $reserva_id);  


  $stmt->execute();

  // Get the result (if any)
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $reserva = $result->fetch_assoc();

    // Cancel the reservation (if found)
    $sql = "DELETE FROM reservas WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $reserva_id);

    if ($stmt->execute()) {
      echo "Reserva cancelada com sucesso!";
    } else {
      echo "Erro ao cancelar a reserva: " . $stmt->error;
    }
  } else {
    echo "Reserva não encontrada ou já expirada.";
  }

  $result->close();
}


$stmt->close();
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Reserva ID: <input type="text" name="reserva_id">
  <input type="submit" name="submit" value="Cancelar Reserva">
</form>
