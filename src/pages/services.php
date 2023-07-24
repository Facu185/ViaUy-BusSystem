<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/main.css">
  <title>Services</title>
  <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
</head>

<body>
  <main class="services">
    <div class="services__card">
      <div class="card__text">
        <h2 id="servicesRent"><span id="servicesRentspan"></span></h2>
        <p id="servicesRentText">

        </p>
      </div>
      <div class="card__img">
        <img src="../assets/transporte interdepartamental" alt="transporte interdepartamental" />
      </div>
    </div>
    <div class="services__card" id="secondary--card">
      <div class="card__img">
        <img src="../assets/express.png" alt="express" />
      </div>
      <div class="card__text">
        <h2 id="servicesLines"><span id="servicesLinesspan"></span> </h2>
        <p id="servicesLinesText">
        </p>
      </div>
    </div>
    <div class="services__card">
      <div class="card__text">
        <h2 id="servicesTourism"> <span id="servicesTourismSpan"></span></h2>
        <p id="servicesTourismText">
        </p>
      </div>
      <div class="card__img">
        <img src="../assets/turistico.jpg" alt="" />
      </div>
    </div>
    <div class="services__card" id="secondary--card">
      <div class="card__img">
        <img src="../assets/ejecutivo.jpg" alt="ejecutivo" />
      </div>
      <div class="card__text">
        <h2 id="serviceExecutive"><span id="serviceExecutiveSpan"> </span></h2>
        <p id="serviceExecutiveText">
        </p>
      </div>
    </div>
    <div class="services__card">
      <div class="card__text">
        <h2 id="serviceTransport"> <span id="serviceTransportSpan"> </span></h2>
        <p id="serviceTransporttext">
        </p>
      </div>
      <div class="card__img">
        <img src="../assets/alquiler.png" alt="alquiler" />
      </div>
    </div>
    <div class="services__card" id="secondary--card">
      <div class="card__img">
        <img src="../assets/encomiendas.jpg" alt="encomiendas" />
      </div>
      <div class="card__text">
        <h2 id="servicesShipment"><span id="servicesShipmentSpan"> </span> </h2>
        <p id="servicesShipmentText">
        </p>
      </div>
    </div>
    <div class="services__card">
      <div class="card__text">
        <h2 id="serviceCustomer"><span id="serviceCustomerSpan"> </span></h2>
        <p id="serviceCustomerText">
        </p>
      </div>
      <div class="card__img">
        <img src="../assets/servicio tecnico" alt="servicio tecnico" />
      </div>
    </div>
  </main>
  <footer class="footer">
    <h3>Via<span>UY</span></h3>
    <div class="footer__bottom">
      <div class="footer__column1">
        <p id="serviceCopy">
          <span>ViaUY</span>
        </p>
      </div>
      <div>
        <div class="footer__row">
          <i class="fa-solid fa-phone"></i>
          <p>+599 123 456</p>
        </div>
        <div class="footer__row">
          <i class="fa-solid fa-envelope-open-text"></i>
          <p>viauy@gmail.com</p>
        </div>
        <div class="footer__row">
          <i class="fa-sharp fa-solid fa-location-pin"></i>
          <p>Montevideo, Uruguay</p>
        </div>
      </div>
      <div class="footer__column3">
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-tiktok"></i>
      </div>
    </div>
  </footer>
  <nav class="nav__bar">
    <div class="home">
      <a href="./home.php">
        <i class="fa-solid fa-house-user"></i>
        <div class="home__text">
          <p id="serviceHome"></p>
        </div>
      </a>
    </div>
    <div class="travels">
      <a href="./travels.php">
        <i class="fa-solid fa-bus"></i>
        <div class="travels__text">
          <p id="serviceTravel"></p>
        </div>
      </a>
    </div>
    <div class="routes">
      <a href="">
        <i class="fa-solid fa-map-location-dot"></i>
        <div class="routes__text">
          <p id="serviceRoutes"></p>
        </div>
      </a>
    </div>
    <div class="porfile">
      <a href="./profile.php">
        <i class="fa-regular fa-user"></i>
        <div class="porfile__text">
          <p id="servicePorfile"></p>
        </div>
      </a>
    </div>
    <div class="about__us">
      <a href="./aboutUs.php">
        <i class="fa-solid fa-users"></i>
        <div class="about__us__text">
          <p id="serviceAbout"></p>
        </div>
      </a>
    </div>
    <div class="services">
      <a href="./services.php">
        <i class="fa-solid fa-hand-holding-dollar"></i>
        <div class="services__text">
          <p id="serviceService"></p>
        </div>
      </a>
    </div>
    <div class="contact">
      <a href="./contact.php">
        <i class="fa-solid fa-comments"></i>
        <div class="contact__text">
          <p id="serviceContact"></p>
        </div>
      </a>
    </div>
  </nav>
  <script src="../js/index.js" type="module"></script>
</body>

</html>