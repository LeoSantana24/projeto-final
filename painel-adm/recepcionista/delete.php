<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];

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
        $successMessage = "Recepcionista deletado com sucesso!";
        
    } else {
        $errorMessage = "Error ao deletar recepcionista: " . $connection->error;
    }

    $stmt->close();
    $connection->close();
}

// Display success or error message (conditionally, if not redirecting)
if (!empty($successMessage)) {
    echo "<a href='/projeto-final/home.php'>$successMessage - Voltar</a>";
} else if (!empty($errorMessage)) {
    echo $errorMessage;
}
?>


