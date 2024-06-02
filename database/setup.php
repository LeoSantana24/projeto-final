

<?php

    

    function registar($nome, $email, $telefone, $genero, $data_nasc, $password) {
        include_once("conexao.php");
        
        $hash = "1234".$senha;
        echo '<br>Password: '.$password;
        echo '- Senha: '.$senha;
        echo 'hash: '.$hash;
        $result = mysqli_query($conn, "INSERT INTO usuarios(nome_completo,email,telefone,genero,data_nasc,senha)
        VALUES('$nome','$email','$telefone','$genero','$data_nasc', '$password')");

        return $result;
    }


?>

