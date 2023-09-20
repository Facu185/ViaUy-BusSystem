<?php
session_start();
include "../controlers/travels.php"
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Welcome</title>
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
</head>

<body>
    <main class="main">
        <section class="main__welcome">
            <header class="header--login">
                <h1 class='logoHead'>Via<span class='logoColor'>UY</span></h1>
                <div class="dropdowns">
                    <div class="dropdown">
                        <button type="button" class="dropbtn" id="homeLanguage"></button>
                        <div class="dropdown-content">
                            <button type='button' id="enHome"></button>
                            <button type='button' id="esHome"></button>
                            <button type='button' id="prHome"></button>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="dropbtn" id="homeSesion"></button>
                        <div class="dropdown-content">
                            <a type='button' id="homeLogin" href="./login.php"></a>
                            <a type='button' id="homeRegister" href="./register.php"></a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="welcome__text">
                <h2 class="main__text" id="homeWelcome"></h2>
                <p id="homeMessage"></p>
            </div>
            <img src="../assets/home-bus.png" alt="bus">
        </section>
        <div class="container">
            <section class="main__selector">
                <form method="POST" action="../controlers/travels.php">
                    <input type="text" placeholder="Origen" id="homeOrigin" name="origen">
                    <i class="fa-solid fa-arrows-up-down"></i>
                    <input type="text" placeholder="Destino" id="homeDestination" name="destino">
                    <input id="input__date" type="date" name="date">
                    <input class="button--primary" id="homeButton" type="submit" value="Buscar">
                </form>
            </section>
        </div>
        <section class="main__travels">
            <h2 class="main__text" id="homeTravels"></h2>
            <div class="travels__list">
                <div class="travel__card">
                    <div class="card__header">
                        <div class="header__text">
                            <i class="fa-solid fa-bus"></i>
                            <div>
                                <p>Turismar</p>
                                <p>2x1(30)sleeper</p>
                            </div>
                        </div>

                    </div>
                    <div class="card__row">
                        <div class="card__info">
                            <i class="fa-solid fa-circle-arrow-right"></i>
                            <div>
                                <p id="homeStartingPoint1"></p>
                                <p>Tres cruces, Montevideo</p>
                            </div>
                        </div>
                        <div class="card__date">
                            <p>Montevideo</p>
                            <p>9:00AM</p>
                            <p>Viernes.</p>
                        </div>
                    </div>
                    <div class="card__row">
                        <div class="card__info">
                            <i class="fa-solid fa-circle-arrow-left"></i>
                            <div>
                                <p id="homeArrivalPoint1"></p>
                                <p>Colonia del sacramento</p>
                            </div>
                        </div>
                        <div class="card__date">
                            <p>Colonia</p>
                            <p>12:00AM</p>
                            <p>Viernes</p>
                        </div>
                    </div>
                </div>
                <div class="travel__card">
                    <div class="card__header">
                        <div class="header__text">
                            <i class="fa-solid fa-bus"></i>
                            <div>
                                <p>Turismar</p>
                                <p>2x1(30)sleeper</p>
                            </div>
                        </div>

                    </div>
                    <div class="card__row">
                        <div class="card__info">
                            <i class="fa-solid fa-circle-arrow-right"></i>
                            <div>
                                <p id="homeStartingPoint"></p>
                                <p>Tres cruces, Montevideo</p>
                            </div>
                        </div>
                        <div class="card__date">
                            <p>Montevideo</p>
                            <p>9:00AM</p>
                            <p>Viernes.</p>
                        </div>
                    </div>
                    <div class="card__row">
                        <div class="card__info">
                            <i class="fa-solid fa-circle-arrow-left"></i>
                            <div>
                                <p id="homeArrivalPoint"></p>
                                <p>Colonia del sacramento</p>
                            </div>
                        </div>
                        <div class="card__date">
                            <p>Colonia</p>
                            <p>12:00AM</p>
                            <p>Viernes</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ad">
            <h3 id="adHome"></h3>
        </section>
        <section class="benefits">
            <div class="benefits__item">
                <i class="fa-regular fa-thumbs-up"></i>
                <p id="likeHome"></p>
                <p id="likeHometxt"> </p>
            </div>
            <div class="benefits__item">
                <i class="fa-regular fa-clock"></i>
                <p id="frecuencyHome"></p>
                <p id="frecuencyHometxt"> </p>
            </div>
            <div class="benefits__item">
                <i class="fa-solid fa-ticket"></i>
                <p id="pricesHome"></p>
                <p id="pricesHometxt"></p>
            </div>
        </section>
        <footer class="footer">
            <h3>Via<span>UY</span></h3>
            <div class="footer__bottom">
                <div class="footer__column1">
                    <p id="copyHome"> </p>
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
                        <p id="homeStart" class="nav__bar__text"></p>
                    </div>
                </a>
            </div>
            <div class="travels">
                <a href="./travels.php">
                    <i class="fa-solid fa-bus"></i>
                    <div class="travels__text">
                        <p id="homeTravelsGo" class="nav__bar__text"></p>
                    </div>
                </a>
            </div>
            <div class="routes">
                <a href="./routes.php">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <div class="routes__text">
                        <p id="homeRoutes" class="nav__bar__text"></p>
                    </div>
                </a>
            </div>
            <div class="porfile">
                <a href="./profile.php">
                    <i class="fa-regular fa-user"></i>
                    <div class="porfile__text">
                        <p id="homeProfile" class="nav__bar__text"></p>
                    </div>
                </a>
            </div>
            <div class="about__us">
                <a href="./aboutUs.php">
                    <i class="fa-solid fa-users"></i>
                    <div class="about__us__text">
                        <p id="homeAbout" class="nav__bar__text"></p>
                    </div>
                </a>
            </div>
            <div class="services">
                <a href="./services.php">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <div class="services__text">
                        <p id="homeService" class="nav__bar__text"></p>
                    </div>
                </a>
            </div>
            <div class="contact">
                <a href="./contact.php">
                    <i class="fa-solid fa-comments"></i>
                    <div class="contact__text">
                        <p id="homeContact" class="nav__bar__text"></p>
                    </div>
                </a>
            </div>
        </nav>
    </main>
    <script src="../js/index.js" type="module"></script>
</body>

</html>