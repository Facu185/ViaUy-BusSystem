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
    <title>Welcome</title>
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <main class="main">
        <section class="main__welcome">
            <?php include('./components/menu.php'); ?>
            <div class="welcome__text">
                <h2 class="main__text" id="homeWelcome"></h2>
                <p id="homeMessage"></p>
            </div>
            <img src="../assets/home-bus.png" alt="bus">
        </section>
        <div class="container">
            <section class="main__selector">
                <form method="POST" action="./travels">
                    <select name="origen" id="homeOrigin">

                        <option value="origen" selected>Origen</option>

                    </select>
                    <i class="fa-solid fa-arrow-right"></i>
                    <select name="destino" id="homeDestination">
                        <option value="Destino" selected>Destino</option>
                    </select>
                    <input id="input__date" type="date" name="date">
                    <input class="button--primary" id="homeButton" type="submit" value="Buscar">
                </form>
            </section>
        </div>
        <section class="main__travels">
            <h2 class="main__text" id="homeTravels"></h2>
            <div class="travels__list">
                <div class="travel__card" data-aos="fade-right">
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
                <div class="travel__card" data-aos="fade-left">
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
            <div class="benefits__item" data-aos="fade-down">
                <i class="fa-regular fa-thumbs-up"></i>
                <p id="likeHome"></p>
                <p id="likeHometxt"> </p>
            </div>
            <div class="benefits__item" data-aos="fade-down">
                <i class="fa-regular fa-clock"></i>
                <p id="frecuencyHome"></p>
                <p id="frecuencyHometxt"> </p>
            </div>

            <div class="benefits__item" data-aos="fade-down">
                <i class="fa-solid fa-ticket"></i>
                <p id="pricesHome"></p>
                <p id="pricesHometxt"></p>
            </div>

        </section>
        <?php include('./components/footer.php'); ?>
        <?php include('./components/navbar.php'); ?>
    </main>
    <script src="../js/index.js" type="module"></script>
    <script src="../js/modules/localizaciones.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>