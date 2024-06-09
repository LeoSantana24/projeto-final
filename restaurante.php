<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projeto";
    
    $connection = new mysqli($servername, $username, $password, $database);



    do{
    $sql = "INSERT INTO recepcionista (name, email, phone, address)" . "VALUES('$name', '$email', '$phone', '$address')";
    $result = $connection->query($sql);
    }
    while(false);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Mesa</title>
   <link rel="stylesheet" href="css/restaurante.css">
   <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    
</head>
<body>
<?php include "includes/header.php" ?>
    
<div class="restaurant-container">
    <div class="restaurant-info">
        <h1>Restaurante</h1>
        <p>Localizado no rés-do-chão junto à piscina, o restaurante oferece serviço de pequeno-almoço e refeições completas ou ligeiras ao almoço e jantar.</p>
        <p>Aos clientes que optem alojar-se connosco em regime de meia pensão ou pensão completa será servido, a cada refeição, um menu diário com três opções de entrada, prato principal e sobremesa. Este menu varia diariamente ao almoço e jantar garantindo ao hóspede uma experiência gastronómica diversificada e estimulante.</p>
        <p>Para os hóspedes que desejem passar o dia na piscina o restaurante oferece ainda uma carta de Snacks diversos e bebidas refrescantes.</p>
        <p>A experiência gastronómica do restaurante começa com o buffet de pequeno-almoço que é composto por um bar de padaria e pastelaria local, caseira, que contempla opções doces e salgadas além de uma seleção de cereais. Na secção de frios oferecemos frutas, saladas simples ou compostas, iogurte, leite e sumo de fruta natural. Ao pequeno-almoço encontrará ainda uma secção de quentes com estação de ovos cozidos e estrelados, bacon, salsichas ou chouriço tradicional de Cabo Verde, legumes salteados, deliciosas panquecas e frutas caramelizadas.</p>
        <p>Adicionalmente o buffet conta com diversos complementos para finalizar as suas combinações preferidas, tais como, mel de flores ou o tradicional mel de cana, frutos secos e cristalizados, manteigas e geleias entre outros. Em caso de restrições alimentares pode informar-nos antecipadamente (preferencialmente 48h) para que possamos preparar opções de pequeno-almoço adequadas à sua dieta.</p>
        <p>Ao almoço e jantar o serviço é feito à carta num cardápio vasto que contempla pratos tradicionais e de assinatura do Chef Cleidir Santana bem como opções de influência internacional.</p>
    </div>
    <div class="restaurant-image">
        <img src="images/restaurante/restaurante.jpg" alt="Imagem do Restaurante">
    </div>
</div>

    
    <main>
        <section class="menu-photos">
            <div class="photo-slider">
                <!-- Aqui vão as fotos dos pratos -->
                <img src="images/restaurante/prato1.jpg" alt="Prato 1">
                <img src="images/restaurante/prato2.jpg" alt="Prato 2">
                <img src="images/restaurante/prato3.jpg" alt="Prato 3">
                <!-- Adicione quantas fotos de pratos desejar -->
            </div>
            <section class="reservation-form">
            <h2>Reserva de Mesa</h2>
            <form action="#" method="post">
                <label for="num-of-people">Número de Pessoas:</label>
                <input type="number" id="num-of-people" name="num-of-people" required>
                
                <label for="reservation-date">Data da Reserva:</label>
                <input type="date" id="reservation-date" name="reservation-date" required>
                
                <label for="reservation-time">Hora da Reserva:</label>
                <input type="time" id="reservation-time" name="reservation-time" required>
                
                <label for="nota">Nota: </label>
                <textarea id="nota" name="nota" rows="4" cols="50"></textarea>
                
                <button type="submit" id="alert-message">Reservar</button>


                <?php
                $message = "Mesa Reservada com sucesso!";
                ?>

                
            </form>
        </section>

    </main>


                    <script>
                    document.getElementById("alert-message").textContent = "<?php echo $message; ?>";
                    alert("<?php echo $message; ?>");
                    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>
</body>
</html>
