<?php

$id = "";
$nome = "";
$telefone = "";
$dataEntrada = ""; 
$dataSaida = "";    
$pessoas = "";     
$descricao = "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "hotelphp";


$connection = new mysqli($servername, $username, $password, $database);

if (isset($_GET['dataEntrada']) && isset($_GET['dataSaida'])) {
    $dataEntrada = $_GET['dataEntrada'];
    $dataSaida = $_GET['dataSaida'];

    $sql = "SELECT * FROM consulta_reservas WHERE dataEntrada >= '$dataEntrada' AND dataSaida <= '$dataSaida'"
    . "VALUES ('$dataEntrada'),( '$dataSaida')";
    $result = $connection->query($sql);


    if (isset($_GET['id']) && isset($_GET['nome']) && isset($_GET['telefone']) && isset($_GET['dataEntrada']) && isset($_GET['dataSaida']) && isset($_GET['pessoas']) && isset($_GET['descricao'])) {
        $id = $_GET['id'];
        $nome = $_GET['nome'];
        $telefone = $_GET['telefone'];
        $dataEntrada = $_GET['dataEntrada'];
        $dataSaida = $_GET['dataSaida'];
        $pessoas = $_GET['pessoas'];
        $descricao = $_GET['descricao'];
      
        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $nome . '</td>';
        echo '<td>' . $dataEntrada . '</td>';
        echo '<td>' . $dataSaida . '</td>';
        echo '<td>' . $pessoas . '</td>';
        echo '<td>' . $descricao . '</td>';
        echo '</tr>';
      }
    } else {
        echo 'Nenhuma reserva encontrada para as datas selecionadas.';
    }

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas de Reservas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Consultas de Reservas</h1>
    <form action="consultar_reservas.php" method="get">
        <label for="data_inicio">Data de Início:</label>
        <input type="date" id="data_inicio" name="data_inicio"><br><br>
        <label for="data_fim">Data de Fim:</label>
        <input type="date" id="data_fim" name="data_fim"><br><br>
        <input type="submit" value="Consultar" method="get">
    </form>
    <table id="reservas">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome do Cliente</th>
                <th>Data de Entrada</th>
                <th>Data de Saída</th>
                <th>Pessoas</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody id="reservas_tbody">
        </tbody>
    </table>
    <script src="consultar_reservas.js"></script>
    <a href="./cancelar.php" class="btn">Cancelar</a>
</body>
</html>