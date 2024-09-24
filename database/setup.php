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

function inserirQuarto($titulo, $descricao, $numero, $imagem, $estado, $preco) {
    $conn = getDatabase();

    // Preparar a chamada ao procedimento armazenado
    $stmt = $conn->prepare("CALL inserir_quarto(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissd", $titulo, $descricao, $numero, $imagem, $estado, $preco);

    if ($stmt->execute()) {
        $result = true;  // Retorna true indicando sucesso
    } else {
        $result = "Erro ao inserir o quarto: " . $stmt->error;  // Retorna a mensagem de erro
    }

    $stmt->close();
    $conn->close();

    return $result;  // Retorna true ou a mensagem de erro
}

function listarQuartos() {
    $conn = getDatabase();

    // Preparar a chamada ao procedimento armazenado
    $stmt = $conn->prepare("CALL listar_quartos()");

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $quartos = [];

        while ($row = $result->fetch_assoc()) {
            $quartos[] = $row;  // Armazena cada quarto no array
        }

        $stmt->close();
        $conn->close();

        return $quartos;  // Retorna um array com todos os quartos
    } else {
        $stmt->close();
        $conn->close();

        return "Erro ao listar os quartos: " . $stmt->error;  // Retorna a mensagem de erro
    }
}


function listarQuartoPorId($id) {
    $conn = getDatabase();

    // Preparar a chamada ao procedimento armazenado
    $stmt = $conn->prepare("CALL listar_quarto_por_id(?)");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            $conn->close();
            return $row;  // Retorna os dados do quarto como array associativo
        } else {
            $stmt->close();
            $conn->close();
            return "Nenhum quarto encontrado com o ID: $id";  // Retorna mensagem se não houver resultado
        }
    } else {
        $stmt->close();
        $conn->close();
        return "Erro ao listar o quarto: " . $stmt->error;  // Retorna a mensagem de erro
    }
}


function atualizarQuarto($id, $titulo, $descricao, $imagem, $estado, $preco) {
    $conn = getDatabase();

    // Preparar a chamada ao procedimento armazenado
    $stmt = $conn->prepare("CALL atualizar_quarto(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssd", $id, $titulo, $descricao, $imagem, $estado, $preco);

    if ($stmt->execute()) {
        $result = true;  // Retorna true indicando sucesso
    } else {
        $result = "Erro ao atualizar o quarto: " . $stmt->error;  // Retorna a mensagem de erro
    }

    $stmt->close();
    $conn->close();

    return $result;  // Retorna true ou a mensagem de erro
}



?>
