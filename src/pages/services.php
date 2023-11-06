<?php

if (!empty($_SESSION["login"])) {
    $login = $_SESSION["login"];
}
if (!empty($_SESSION["rol"])) {
  header('location: ./dashboard');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <title>Services</title>
  <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
  <main class="services">
    <?php include('./components/menu.php'); ?>
    <div class="services__card " data-aos="fade-left">
      <div class="card__text">
        <h2 id="servicesRent"><span id="servicesRentspan"></span></h2>
        <p id="servicesRentText">

        </p>
      </div>
      <div class="card__img">
        <img src="../assets/transporte interdepartamental.webp" alt="transporte interdepartamental" />
      </div>
    </div>
    <div class="services__card" data-aos="zoom-in-down" id="secondary--card">
      <div class="card__img">
        <img src="../assets/express.webp" alt="express" />
      </div>
      <div class="card__text">
        <h2 id="servicesLines"><span id="servicesLinesspan"></span> </h2>
        <p id="servicesLinesText">
        </p>
      </div>
    </div>
    <div class="services__card" data-aos="zoom-in-down">
      <div class="card__text">
        <h2 id="servicesTourism"> <span id="servicesTourismSpan"></span></h2>
        <p id="servicesTourismText">
        </p>
      </div>
      <div class="card__img">
        <img src="../assets/turistico.webp" alt="" />
      </div>
    </div>
    <div class="services__card" data-aos="zoom-in-down" id="secondary--card">
      <div class="card__img">
        <img src="../assets/ejecutivo.webp" alt="ejecutivo" />
      </div>
      <div class="card__text">
        <h2 id="serviceExecutive"><span id="serviceExecutiveSpan"> </span></h2>
        <p id="serviceExecutiveText">
        </p>
      </div>
    </div>
    <div class="services__card" data-aos="zoom-in-down">
      <div class="card__text">
        <h2 id="serviceTransport"> <span id="serviceTransportSpan"> </span></h2>
        <p id="serviceTransporttext">
        </p>
      </div>
      <div class="card__img">
        <img src="../assets/alquiler.webp" alt="alquiler" />
      </div>
    </div>
    <div class="services__card" data-aos="zoom-in-down" id="secondary--card">
      <div class="card__img">
        <img src="../assets/encomiendas.webp" alt="encomiendas" />
      </div>
      <div class="card__text">
        <h2 id="servicesShipment"><span id="servicesShipmentSpan"> </span> </h2>
        <p id="servicesShipmentText">
        </p>
      </div>
    </div>
    <div class="services__card" data-aos="zoom-in-down">
      <div class="card__text">
        <h2 id="serviceCustomer"><span id="serviceCustomerSpan"> </span></h2>
        <p id="serviceCustomerText">
        </p>
      </div>
      <div class="card__img">
        <img src="../assets/servicio tecnico.webp" alt="servicio tecnico" />
      </div>
    </div>
  </main>
  <?php include('./components/footer.php'); ?>
  <?php include('./components/navbar.php'); ?>
  <script src="../js/index.js" type="module"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>