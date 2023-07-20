<?php
session_start();
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
                <div class="dropdown">
                    <button type="button" class="dropbtn">Language</button>
                    <div class="dropdown-content">
                        <button type='button' id="engSwitcher">Ingles</button>
                        <button type='button' id="esSwitcher">Español</button>
                        <button type='button' id="prSwitcher">Portuguese</button>
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
                <input type="text" placeholder="Origen" id="homeOrigin">
                <i class="fa-solid fa-arrows-up-down"></i>
                <input type="text" placeholder="Destino" id="homeDestination">
                <input id="input__date" type="date">
                <button class="button--primary" id="homeButton"></button>
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
                                <p>Viernes 19 mayo.</p>
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
                                <p>Viernes 19 de mayo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="nav__bar">
            <div class="home">
                <a href="./home.php">
                    <i class="fa-solid fa-house-user"></i>
                    <div class="home__text">
                        <p id="homeStart">a</p>
                    </div>
                </a>
            </div>
            <div class="travels">
                <a href="./travels.php">
                    <i class="fa-solid fa-bus"></i>
                    <div class="travels__text">
                        <p id="homeTravelsGo"></p>
                    </div>
                </a>
            </div>
            <div class="routes">
                <a href="">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <div class="routes__text">
                        <p id="homeRoutes"></p>
                    </div>
                </a>
            </div>
            <div class="porfile">
                <a href="./profile.php">
                    <i class="fa-regular fa-user"></i>
                    <div class="porfile__text">
                        <p id="homePorfile"></p>
                    </div>
                </a>
            </div>
        </footer>
    </main>
</body>
<script src="../js/index.js" type="module"></script>

</html>