<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>About Us</title>
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
</head>

<body>
    <main class="about">
        <header class="header--login">
            <h1 class='logoHead'>Via<span class='logoColor'>UY</span></h1>
            <div class="dropdowns">
                <div class="dropdown">
                    <button type="button" class="dropbtn" id="aboutLanguage"></button>
                    <div class="dropdown-content">
                        <button type='button' id="enAbout"></button>
                        <button type='button' id="esAbout"></button>
                        <button type='button' id="prAbout"></button>
                    </div>
                </div>
                <div class="dropdown">
                    <button type="button" class="dropbtn" id="aboutSesion"></button>
                    <div class="dropdown-content">
                        <a type='button' id="aboutLogin" href="./login.php"></a>
                        <a type='button' id="aboutRegister" href="./register.php"></a>
                    </div>
                </div>
            </div>
        </header>
        <section class="about__banner">
            <img src="../assets/nosotros" alt="nosotros" class="img1" />
            <div class="banner__text">
                <h2 id="aboutTitle"></h2>
                <p id="aboutFtext"></p>
                <p id="aboutStext"></p>
            </div>
        </section>
        <section class="about__quote">
            <div class="quote__left">
                <i class="fa-solid fa-quote-left"></i>
                <p id="aboutConfort"> </p>
                <i class="fa-sharp fa-solid fa-quote-right"></i>
            </div>
            <img src="../assets/aboutus2.png" alt="travelBus" />
        </section>
        <section class="about__banner">
            <img src="../assets/nuestras unidades" alt="nuestras unidades" class="img1" />
            <div class="banner__text">
                <h2 id="aboutBus"></h2>
                <p id="aboutBustxt"> </p>
            </div>
        </section>
        <section class="about__quote">
            <div class="quote__left">
                <h2 id="aboutSecurity"></h2>
                <p id="aboutSecuritytxt"></p>
            </div>
            <img src="../assets/seguridad.png" alt="seguridad" />
        </section>
        <section class="about__banner">
            <img src="../assets/comodidad" alt="comodidad" class="img1" />
            <div class="banner__text">
                <h2 id="aboutConforttitle"></h2>
                <p id="aboutConforttxt"></p>
            </div>
        </section>
    </main>
    <footer class="footer">
        <h3>Via<span>UY</span></h3>
        <div class="footer__bottom">
            <div class="footer__column1">
                <p id="aboutCopy">

                </p>
                <span>ViaUY</span>
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
                    <p id="aboutHome" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="travels">
            <a href="./travels.php">
                <i class="fa-solid fa-bus"></i>
                <div class="travels__text">
                    <p id="aboutTravels" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="routes">
            <a href="">
                <i class="fa-solid fa-map-location-dot"></i>
                <div class="routes__text">
                    <p id="aboutRoutes" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="porfile">
            <a href="./profile.php">
                <i class="fa-regular fa-user"></i>
                <div class="porfile__text">
                    <p id="aboutPorfile" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="about__us">
            <a href="./aboutUs.php">
                <i class="fa-solid fa-users"></i>
                <div class="about__us__text">
                    <p id="aboutAbout" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="services">
            <a href="./services.php">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <div class="services__text">
                    <p id="aboutServices" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="contact">
            <a href="./contact.php">
                <i class="fa-solid fa-comments"></i>
                <div class="contact__text">
                    <p id="aboutContact" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
    </nav>
    <script src="../js/index.js" type="module"></script>
</body>

</html>