<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travels</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header--travel">
        <i class="fa-solid fa-filter"></i>
    </header>
    <main class="main--travel">
        <section class="selected__travel">
            <p id="travelsSelected"></p>
            <div>
                <p>Montevideo</p>
                <i class="fa-solid fa-right-left"></i>
                <p>Montevideo</p>
            </div>
            <p>19 -Mayo - 2023 | Viernes</p>
            <img src="../assets/travels-bus.png" alt="bus">
        </section>
    </main>
    <section class="travel__cards">
        <div class="travel__card">
            <div class="tcard__header">
                <p>Turismar</p>
                <p class="sky">$500</p>
            </div>
            <p class="gray">A/C Sleeper (2+2)</p>
            <p>9:00 AM - 12:00 AM</p>
            <p class="green">15 Asientos libres</p>
        </div>
        <div class="travel__card">
            <div class="tcard__header">
                <p>Turismar</p>
                <p class="sky">$500</p>
            </div>
            <p class="gray">A/C Sleeper (2+2)</p>
            <p>9:00 AM - 12:00 AM</p>
            <p class="green">15 Asientos libres</p>
        </div>
        <div class="travel__card">
            <div class="tcard__header">
                <p>Turismar</p>
                <p class="sky">$500</p>
            </div>
            <p class="gray">A/C Sleeper (2+2)</p>
            <p>9:00 AM - 12:00 AM</p>
            <p class="green">15 Asientos libres</p>
        </div>
    </section>
    <footer class="nav__bar">
        <div class="home">
            <a href="./home.php">
                <i class="fa-solid fa-house-user"></i>
                <div class="home__text">
                    <p id="travelsHome"></p>
                </div>
            </a>
        </div>
        <div class="travels">
            <a href="./travels.php">
                <i class="fa-solid fa-bus"></i>
                <div class="travels__text">
                    <p id="travelsGo"></p>
                </div>
            </a>
        </div>
        <div class="routes">
            <a href="">
                <i class="fa-solid fa-map-location-dot"></i>
                <div class="routes__text">
                    <p id="travelsRoutes"></p>
                </div>
            </a>
        </div>
        <div class="porfile">
            <a href="./profile.php">
                <i class="fa-regular fa-user"></i>
                <div class="porfile__text">
                    <p id="travelsPorfile"></p>
                </div>
            </a>
        </div>
    </footer>

</body>
<script src="../js/index.js" type="module"></script>

</html>