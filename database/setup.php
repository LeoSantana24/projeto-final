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


function inserirCliente($nome, $email, $telefone, $password) {
    // Configurações de conexão
    $conn = getDatabase();

    // Preparar a chamada ao procedimento armazenado
    $stmt = $conn->prepare("CALL inserir_cliente(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $telefone, $password);

    // Executar o procedimento armazenado
    if ($stmt->execute()) {
        header ("location: ../registar.php?res=true");
    } else {
        header ("location: ../registar.php?res=false");
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}

function inserirAdministrador($nome, $email, $telefone, $tipo, $password) {
    // Configurações de conexão
  $conn = getDatabase();

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
    $conn = getDatabase();

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

function login($email, $password) {
    $conn = getDatabase();

    // Preparar a chamada ao procedimento armazenado
    $stmt = $conn->prepare("CALL login(?, ?)");
    $stmt->bind_param("ss", $email, $password);

    // Executar a consulta
    if ($stmt->execute()) {
        // Pega o resultado da consulta
        $result = $stmt->get_result();

        // Verifica se há algum resultado (login bem-sucedido)
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $id = $row['id'];
            $nome = $row['nome'];

            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome;

            header("location: ../perfil.php");
        } else {
            // Login falhou
            header("location: ../login.php?res=false");
        }
    } else {
        // Se a execução falhar, exibe um erro
        die("Erro ao executar o procedimento de login: " . $stmt->error);
    }

    // Fechar a consulta e a conexão
    $stmt->close();
    $conn->close();
}

?>
