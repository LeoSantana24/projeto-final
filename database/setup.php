<?php
function getDatabase(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_projeto";


    $connection = new mysqli($servername, $username, $password, $database);
    if($connection->connect_errno){
        die("ERROR to mysql" . $connection->connect_errno);
    }
    return $connection;
}


function inserirCliente($nome, $email, $telefone, $tipo, $password) {
    // Configurações de conexão
    $conn = getDatabase()

    // Preparar a chamada ao procedimento armazenado
    $stmt = $conn->prepare("CALL inserir_cliente(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $email, $telefone, $tipo, $password);

    // Executar o procedimento armazenado
    if ($stmt->execute()) {
        echo "Cliente inserido com sucesso.";
    } else {
        echo "Erro ao inserir cliente: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}

function inserirAdministrador($nome, $email, $telefone, $tipo, $password) {
    // Configurações de conexão
  $conn = getDatabase()

    // Preparar a chamada ao procedimento armazenado
    $stmt = $conn->prepare("CALL inserir_administrador(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $email, $telefone, $tipo, $password);

    // Executar o procedimento armazenado
    if ($stmt->execute()) {
        echo "Administrador inserido com sucesso.";
    } else {
        echo "Erro ao inserir administrador: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}

function inserirRecepcionista($nome, $email, $telefone, $tipo, $password) {
    // Configurações de conexão
    $servername = "localhost";
    $username = "root";
    $password_db = "sua_senha";
    $dbname = "nome_do_banco_de_dados";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Preparar a chamada ao procedimento armazenado
    $stmt = $conn->prepare("CALL inserir_recepcionista(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $email, $telefone, $tipo, $password);

    // Executar o procedimento armazenado
    if ($stmt->execute()) {
        echo "Recepcionista inserido com sucesso.";
    } else {
        echo "Erro ao inserir recepcionista: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}
?>




?>

