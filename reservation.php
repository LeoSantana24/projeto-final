<?php

$id = "";
$nome = "";
$telefone = "";
$dataEntrada = ""; 
$dataSaida = "";    
$pessoas = "";     // Combined adults and children
$descricao = "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "cadastro";

$connection = new mysqli($servername, $username, $password, $database);

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST["nome"]);
    $telefone = trim($_POST["telefone"]);
    $dataEntrada = trim($_POST["dataEntrada"]);  
    $dataSaida = trim($_POST["dataSaida"]);       
    $pessoas = trim($_POST["pessoas"]);           

    if (empty($nome) || empty($telefone) || empty($dataEntrada) || empty($dataSaida) || empty($pessoas)) {
      $errorMessage = "Todos os campos são obrigatórios.";
      
} else if(($telefone)) {
        $errorMessage = "O número de telefone informado é inválido.";
    }

    if (empty($errorMessage)) {
        $sql = "INSERT INTO consulta_reservas (id, nome, telefone, dataEntrada, dataSaida, numero_pessoas, descricao)"
                  . "VALUES ('$id'), ('$nome'), ('$telefone'), ('$dataEntrada'),( '$dataSaida'), ('$numero_pessoas'), ('$descricao')";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param( $id, $nome, $telefone, $dataEntrada, $dataSaida, $pessoas, $descricao);

        if ($stmt->execute()) {
            $successMessage = "Reserva efetuada com sucesso!";
            $nome = "";
            $telefone = "";
            $dataEntrada = "";
            $dataSaida = "";
            $pessoas = "";
            $descricao = "";
        } else {
            $errorMessage = "Erro ao efetuar reserva: " . $connection->error;
        }

        $stmt->close();
    }

    header("location: ../home.php");
    exit;
}

$connection->close();

?>


<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sal Island Hotel</title>
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
            <h1 class="heading mb-3">Formulário de Reserva</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Reserva</li>
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

    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="name">Nome</label>
                  <input type="text" id="name" class="form-control " value="<?php echo $nome;?>">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="phone"  value="<?php echo $telefone;?>">Telefone</label>
                  <input type="text" id="phone" class="form-control ">
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email" >Email</label>
                  <input type="email" id="email" class="form-control"   value="<?php echo $email;?>">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">Data entrada</label>
                  <input type="text" id="checkin_date" class="form-control"  value="<?php echo $dataEntrada;?>">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkout_date">Data saida</label>
                  <input type="text" id="checkout_date" class="form-control"  value="<?php echo $dataSaida;?>">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="adults" class="font-weight-bold text-black" value="<?php echo $adultos;?>">Adultos</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="adults" class="form-control">
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                      <option value="">4+</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <label for="children" class="font-weight-bold text-black" value="<?php echo $criancas;?>">Children</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="children" class="form-control">
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                      <option value="">4+</option>
                    </select>
                  </div>
                </div>
              </div>

              

              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="message">Notas</label>
                  <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <a href="./reservas/consulta.php" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Reserve Agora</a>
                </div>
              </div>
            </form>

          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Endereço:</span> <span class="text-black"> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
                <p><span class="d-block">Telefone:</span> <span class="text-black"> (+238) 984 25 80</span></p>
                <p><span class="d-block">Email:</span> <span class="text-black"> info@salislandhotel.com</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section testimonial-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">People Says</h2>
          </div>
        </div>
        <div class="row">
          <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            
            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; Jean Smith</em></p>
            </div> 

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>
                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>


            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; Jean Smith</em></p>
            </div> 

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>
                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

          </div>
            <!-- END slider -->
        </div>

      </div>
    </section>

    
    
    <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
                <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
                <a href="./reservas/consulta.php" class="btn btn-outline-white-primary py-3 text-white px-5" id="reserveNowButton">Reserve Now</a>
            </div>
        </div>
    </div>
</section>

<script>
const reserveButton = document.getElementById('reserveNowButton');

reserveButton.addEventListener('click', function() {
  window.alert("Your reservation has been successfully registered!");
});
</script>


      <?php include "includes/footer.php" ?>
    
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