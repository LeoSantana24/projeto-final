

<?php

    

    function registar($nome, $email, $telefone, $genero, $data_nasc, $pais, $senha) {
        include_once("config.php");
        
        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome_completo,email,telefone,genero,data_nasc,pais,senha)
        VALUES('$nome','$email','$telefone','masculino','$data_nasc','$pais','$senha')");

        return $result;
    }


?>