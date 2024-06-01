<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hotelphp";

    $connection = new mysqli($servername, $username, $password, $database);

    $id = "";
    $name = "";
    $email = "";
    $phone = "";
    $address = "";

  

    $errorMessage = "";
    $successMessage = true;

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET["id"])){
            header("location: /edit.php");
            exit;
        }
        $id = $_GET["id"];

        $sql = "SELECT * FROM recepcionista WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if($row){
            header("location: /edit.php");
            exit;
        }

        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $address = $row["address"];
    }
    else{
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        do{
            if(empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)){
                $errorMessage = "Todos os campos são obrigatórios";
                break;
            }

            $sql = "UPDATE recepcionista". 
            "SET name = '$name', email = '$email', phone = '$phone', address = '$address'" .
            "WHERE id = $id";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Dados invalidos: " . $connection->error;
                break;
            }

            $successMessage = "Cliente atualizado";

            header("location: ../projeto-final/home.php");
            exit;
        } while(false);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container my-5">
        <h1>Editar</h1>

        <?php 
            if(!empty($errorMessage)){
                echo"
                <div class='alert alert-warning role='alert'>
                    <strong>$errorMessage</strong>
                    <button class='btn-close'></button>
                </div>

                ";
            }
        ?>
        <form method="get">
            <input type="hidden"  value="<?php echo $id ?>">
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" value="<?php echo $name?>" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" value="<?php echo $email?>" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Telefone</label>
                <div class="col-sm-6">
                    <input type="text" name="phone" value="<?php echo $phone?>" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Endereço</label>
                <div class="col-sm-6">
                    <input type="text" name="address" value="<?php echo $address ?>" class="form-control">
                </div>
            </div>
            <?php 
                if(!empty($successMessage)){
                    echo"";
                }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/projeto-final/painel-adm/home.php" class="btn btn-outline-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>