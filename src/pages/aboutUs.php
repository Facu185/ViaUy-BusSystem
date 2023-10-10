<?php
if (!empty($_SESSION["login"])) {
    $login = $_SESSION["login"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>About Us</title>
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>

<body>
    <main class="about">
        <?php include('./components/menu.php'); ?>
        <section class="about__banner" data-aos="fade-right">
            <img src="../assets/nosotros" alt="nosotros" class="img1" />
            <div class="banner__text">
                <h2 id="aboutTitle"></h2>
                <p id="aboutFtext"></p>
                <p id="aboutStext"></p>
            </div>
        </section>
        <section class="about__quote" data-aos="zoom-in-down">
            <div class="quote__left">
                <i class="fa-solid fa-quote-left"></i>
                <p id="aboutConfort"> </p>
                <i class="fa-sharp fa-solid fa-quote-right"></i>
            </div>
            <img src="../assets/aboutus2.png" alt="travelBus" />
        </section>
        <section class="about__banner" data-aos="zoom-in-down">
            <img src="../assets/nuestras unidades" alt="nuestras unidades" class="img1" />
            <div class="banner__text">
                <h2 id="aboutBus"></h2>
                <p id="aboutBustxt"> </p>
            </div>
        </section>
        <section class="about__quote" data-aos="zoom-in-down">
            <div class="quote__left">
                <h2 id="aboutSecurity"></h2>
                <p id="aboutSecuritytxt"></p>
            </div>
            <img src="../assets/seguridad.png" alt="seguridad" />
        </section>
        <section class="about__banner" data-aos="zoom-in-down">
            <img src="../assets/comodidad" alt="comodidad" class="img1" />
            <div class="banner__text">
                <h2 id="aboutConforttitle"></h2>
                <p id="aboutConforttxt"></p>
            </div>
        </section>
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