<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porfile</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
</head>

<body>
    <main class="profile">
        <div class="profile__header">
            <img src="../assets/profile-avatar.png" alt="">
            <h2 id="porfileName"></h2>
        </div>
        <div class="profile__main">
            <form action="" class="profile__form">
                <label for="" id="profileTextEmail"></label>
                <input type="email" name="" id="" placeholder="Email">
                <label for="" id="profileTextPassword"></label>
                <input type="password" name="" id="profilePassword" placeholder="Contraseña">
                <button class="button--primary" id="buttonProfile"></button>
            </form>
        </div>
    </main>
    <nav class="nav__bar">
        <div class="home">
            <a href="./home.php">
                <i class="fa-solid fa-house-user"></i>
                <div class="home__text">
                    <p id="profileHome"></p>
                </div>
            </a>
        </div>
        <div class="travels">
            <a href="./travels.php">
                <i class="fa-solid fa-bus"></i>
                <div class="travels__text">
                    <p id="profileTravels"></p>
                </div>
            </a>
        </div>
        <div class="routes">
            <a href="">
                <i class="fa-solid fa-map-location-dot"></i>
                <div class="routes__text">
                    <p id="profileRoutes"></p>
                </div>
            </a>
        </div>
        <div class="porfile">
            <a href="./profile.php">
                <i class="fa-regular fa-user"></i>
                <div class="porfile__text">
                    <p id="profileProfile"></p>
                </div>
            </a>
        </div>
        <div class="about__us">
                <a href="./aboutUs.php">
                    <i class="fa-solid fa-users"></i>
                    <div class="about__us__text">
                        <p id="profileAbout"></p>
                    </div>
                </a>
            </div>
            <div class="services">
                <a href="./services.php">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <div class="services__text">
                        <p id="profileService"></p>
                    </div>
                </a>
            </div>
            <div class="contact">
                <a href="./contact.php">
                    <i class="fa-solid fa-comments"></i>
                    <div class="contact__text">
                        <p id="profileContact"></p>
                    </div>
                </a>
            </div>
    </nav>
    <script src="../js/index.js" type="module"></script>
</body>


</html>