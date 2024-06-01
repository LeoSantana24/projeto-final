<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"]; // Cast to integer for safety

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hotelphp";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $stmt = $connection->prepare("DELETE FROM recepcionista WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<a href='/home.php'>Recepcionista deletado, voltar</a>"; 
    } else {
        echo "Error deleting receptionist: " . $connection->error;
    }

    $stmt->close();
    $connection->close();
}

?>

