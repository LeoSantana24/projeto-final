<?php


session_start();
if(!isset($_SESSION['id'])){
  header('Location: login.php');
}
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$telefone = $_SESSION['telefone'];



$checkin = null;
$checkout = null;
$adults = null;
$children = null;
$quartos = null;
$noites = 0;





if(isset($_GET["checkin"])){
  $checkin = $_GET["checkin"];
}

if(isset($_GET["checkout"])){
  $checkout = $_GET["checkout"];
}

if(isset($_GET["adults"])){
  $adults = $_GET["adults"];
}

if(isset($_GET["children"])){
  $children = $_GET["children"];
}

if($checkin != null && $checkout != null){
  // Converte as strings de datas em objetos DateTime
  $checkinDate = new DateTime($checkin);
  $checkoutDate = new DateTime($checkout);
  
  // Calcula a diferença entre as duas datas
  $interval = $checkinDate->diff($checkoutDate);
  
  // O número de noites será o intervalo de dias
  $noites = $interval->days;
}

require_once "database/setup.php";
$quartos = listarDisponibilidadeQuartos();


?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Disponibilidade quarto- Sal Island Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
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

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <?php include "includes/header.php" ?>

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Quartos</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.php">Home</a></li>
              <li>&bullet;</li>
              <li>Quartos</li>
            </ul>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    <section class="section pb-4">
      <div class="container">
       
        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

            <form action="#">
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="date" id="checkin_date" class="form-control" <?php if($checkin != null) { echo 'value="'.$checkin.'"'; } ?>>
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="date" id="checkout_date" class="form-control" <?php if($checkout != null) { echo 'value="'.$checkout.'"'; } ?>>
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="adults" class="font-weight-bold text-black">Adults</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="adults" id="adults" class="form-control" value="0">
                            <option value="1" <?php if ($adults == "1") echo 'selected'; ?>>1</option>
                            <option value="2" <?php if ($adults == "2") echo 'selected'; ?>>2</option>
                            <option value="3" <?php if ($adults == "3") echo 'selected'; ?>>3</option>
                            <option value="4" <?php if ($adults == "4") echo 'selected'; ?>>4+</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="children" class="font-weight-bold text-black">Children</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="children" id="children" class="form-control" value="2">
                            <option value="0" <?php if ($children == "0") echo 'selected'; ?>>0</option>
                            <option value="1" <?php if ($children == "1") echo 'selected'; ?>>1</option>
                            <option value="2" <?php if ($children == "2") echo 'selected'; ?>>2</option>
                            <option value="3" <?php if ($children == "3") echo 'selected'; ?>>3</option>
                            <option value="4" <?php if ($children == "4") echo 'selected'; ?>>4+</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 align-self-end">
                  <button class="btn btn-primary btn-block text-white">Check Availabilty</button>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </section>

    
    <section class="section">
      <div class="container">
        
        <div class="row">

        <?php
            if($quartos != null) {
                foreach($quartos as $quarto){
                    echo '<div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                            <figure class="img-wrap">
                                <img src="images/'.$quarto['imagem'].'" alt="Quarto" class="img-fluid mb-3">
                            </figure>
                            <div class="p-3 text-center room-info">
                                <h2>'.$quarto['titulo'].'</h2>
                                <span class="text-uppercase letter-spacing-1">'.$quarto['preco'].'€</span>
                            </div>
                            <button class="btn btn-primary btn-block text-white" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#confirmarReserva"
                                    data-id-quarto="'.$quarto['id'].'"
                                    data-quarto-nome="'.$quarto['titulo'].'"
                                    data-preco-total="'.$quarto['preco'].'"
                                    data-noites="'.$noites.'">
                                Reserva agora
                            </button>
                        </div>';
                }
            }
        ?>

          

        </div>
      </div>
    </section>

    <div class="modal fade" id="confirmarReserva" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="reservaModalLabel">Resumo da sua reserva</h4>                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div>
                <h4>Dados Pessoais</h4>
                <p><strong>Nome: </strong><span><?php echo $nome ?></span></p>
                <p><strong>E-mail: </strong><span><?php echo $email ?></span></p>
                <p><strong>Telefone: </strong><span><?php echo $telefone ?></span></p>
              </div>
              <div>
                <h4>Informações do quarto</h4>
                <p><strong>Nome do quarto: </strong><span id="quartoNome"></span></p>
                <p><strong>Entrada: </strong><span><?php echo $checkin ?></span></p>
                <p><strong>Saída: </strong><span><?php echo $checkout ?></span></p>
                <p><strong>Noites: </strong><span><?php echo $noites ?> Noite</span></p>
                <p><strong>Adultos: </strong><span><?php echo $adults ?></span></p>
                <p><strong>Crianças: </strong><span><?php echo $children ?></span></p>
                <hr />
                <p style="color: green;"><strong>Preço total: </strong><span id="precoTotal"></span></p>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="database/processar_reserva.php" method="post">
                    <input type="hidden" name="id-user" value="<?php echo $id; ?>" />
                    <input type="hidden" name="id-quarto" value="" /> <!-- Campo oculto para o ID do quarto -->
                    <input type="hidden" name="checkin" value="<?php echo $checkin; ?>" />
                    <input type="hidden" name="checkout" value="<?php echo $checkout; ?>" />
                    <button type="submit" class="btn btn-primary">Confirmar reserva</button>
                </form>

            </div>
        </div>
    </div>
</div>
    
    <section class="section bg-light">

      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade">Great Offers</h2>
            <p data-aos="fade">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
      
        <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
          <a href="#" class="image d-block bg-image-2" style="background-image: url('images/img_1.jpg');"></a>
          <div class="text">
            <span class="d-block mb-4"><span class="display-4 text-primary">$199</span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4">Family Room</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
          </div>
        </div>
        <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="200">
          <a href="#" class="image d-block bg-image-2 order-2" style="background-image: url('images/img_2.jpg');"></a>
          <div class="text order-1">
            <span class="d-block mb-4"><span class="display-4 text-primary">$299</span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4">Presidential Room</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
          </div>
        </div>

      </div>
    </section>

    <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
      <div class="container" >
        <div class="row align-items-center">
          <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
            <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
          </div>
          <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
            <a href="reservation.php" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
          </div>
        </div>
      </div>
    </section>

    <?php include "includes/footer.php" ?>


    <script>
      var confirmarReservaModal = document.getElementById('confirmarReserva');
      confirmarReservaModal.addEventListener('show.bs.modal', function (event) {
          // Botão que acionou o modal
          var button = event.relatedTarget;

          // Extrai as informações dos atributos data-*
          var quartoId = button.getAttribute('data-id-quarto');
          var quartoNome = button.getAttribute('data-quarto-nome');
          var precoPorNoite = parseFloat(button.getAttribute('data-preco-total')); // Preço por noite
          var noites = parseInt(button.getAttribute('data-noites')); // Número de noites

          // Calcula o preço total
          var precoTotal = precoPorNoite * noites;

          // Atualiza os elementos no modal com as informações
          confirmarReservaModal.querySelector('.modal-body #quartoNome').textContent = quartoNome;
          confirmarReservaModal.querySelector('.modal-body #precoTotal').textContent = precoTotal.toFixed(2) + '€';
          confirmarReservaModal.querySelector('input[name="id-quarto"]').value = quartoId;
      });
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>