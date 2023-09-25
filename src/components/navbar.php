<?php

if (!empty($_SESSION["login"])) {
    $login = $_SESSION["login"];
}


?>

<nav class="nav__bar">
    <div class="home">
        <a href="./home">
            <i class="fa-solid fa-house-user"></i>
            <div class="home__text">
                <p id="homeStart" class="nav__bar__text"></p>
            </div>
        </a>
    </div>
    <div class="routes">
        <a href="./routes">
            <i class="fa-solid fa-map-location-dot"></i>
            <div class="routes__text">
                <p id="homeRoutes" class="nav__bar__text"></p>
            </div>
        </a>
    </div>

    <?php
    if (isset($login)):
        ?>
        <div class="porfile">
            <a href="./profile">
                <i class="fa-regular fa-user"></i>
                <div class="porfile__text">
                    <p id="homeProfile" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <?php
    endif
    ?>
    <div class="about__us">
        <a href="./aboutUs">
            <i class="fa-solid fa-users"></i>
            <div class="about__us__text">
                <p id="homeAbout" class="nav__bar__text"></p>
            </div>
        </a>
    </div>
    <div class="services">
        <a href="./services">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <div class="services__text">
                <p id="homeService" class="nav__bar__text"></p>
            </div>
        </a>
    </div>
    <div class="contact">
        <a href="./contact">
            <i class="fa-solid fa-comments"></i>
            <div class="contact__text">
                <p id="homeContact" class="nav__bar__text"></p>
            </div>
        </a>
    </div>
</nav>