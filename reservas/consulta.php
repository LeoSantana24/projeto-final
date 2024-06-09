<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotelphp";

$connection = new mysqli($servername, $username, $password, $database);

if (isset($_GET['data_inicio']) && isset($_GET['data_fim'])) {
    $data_inicio = $_GET['data_inicio'];
    $data_fim = $_GET['data_fim'];

    $sql = "SELECT * FROM reservas WHERE data_entrada >= '$data_inicio' AND data_saida <= '$data_fim'";
    $result = $connection->query($sql);


    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Nome do Cliente</th>';
        echo '<th>Data de Entrada</th>';
        echo '<th>Data de Saída</th>';
        echo '<th>Pessoas</th>';
        echo '<th>Descrição</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nome_cliente'] . '</td>';
            echo '<td>' . $row['data_entrada'] . '</td>';
            echo '<td>' . $row['data_saida'] . '</td>';
            echo '<td>' . $row['pessoas'] . '</td>';
            echo '<td>' . $row['descricao'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Nenhuma reserva encontrada para as datas selecionadas.';
    }
} else {
    echo 'Por favor, selecione as datas para consultar as reservas.';
}

$connection->close();
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
        <input type="submit" value="Consultar">
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
</body>
</html>