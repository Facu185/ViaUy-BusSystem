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
    <title>Porfile</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <main class="profile">
        <?php include('./components/menu.php'); ?>
        <div class="container__profile">
            <div class="iphone">
                <div class="header__profile">
                    <div class="header-summary">
                        <div class="summary-text">
                            <h1 id="profileWelcome"></h1>
                        </div>
                        <div class="summary-balance">
                            <h2>
                                <?php echo $_SESSION["login"]["nombre"] ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="content__profile">
                    <div class="card__profile">
                        <h2 id="profileData" class="about__user"></h2>
                        <div class="upper-row">
                            <div class="card-item">
                                <h2 id="profileName"></h2>
                                <p>
                                    <?php echo $_SESSION["login"]["nombre"] ?>
                                </p>
                            </div>
                            <div class="card-item">
                                <h2 id="profileSurname"></h2>
                                <p>
                                    <?php echo $_SESSION["login"]["apellido"] ?>
                                </p>
                            </div>
                            <div class="card-item">
                                <h2 id="profilePhone"></h2>
                                <p>
                                    <?php echo $_SESSION["login"]["celular"] ?>
                                </p>
                            </div>
                            <div class="card-item">
                                <h2 id="profileMail"></h2>
                                <p>
                                    <?php echo $_SESSION["login"]["email"] ?>
                                </p>
                            </div>
                        </div>
                        <div class="lower-row">
                            <div class="icon-item">
                                <div class="icon"><i class="fa-solid fa-gear"></i></div>
                                <div class="icon-text">
                                    <p id="profileSettings"></p>
                                </div>
                            </div>
                            <div class="icon-item">
                                <div class="icon"><i class="fa-solid fa-route"></i></div>
                                <div class="icon-text">
                                    <p id="profileTravels"></p>
                                </div>
                            </div>
                            <div class="icon-item">
                                <div class="icon"><i class="fa-solid fa-pen-to-square"></i></div>
                                <div class="icon-text">
                                    <p id="profileModify"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transactions"><span class="t-desc">
                            <h2 id="mineTravels"></h2>
                        </span>
                        <div class="transaction">
                            <div class="t-icon-container">
                                <i class="fa-solid fa-bus"></i>
                            </div>
                            <div class="t-details">
                                <div class="t-title">
                                    <p>Origen: Pando</p>
                                    <p>Destino: Salinas</p>
                                </div>
                                <div class="t-time">
                                    <p>03.45PM</p>
                                </div>
                            </div>
                        </div>

                        <div class="transaction">
                            <div class="t-icon-container"><i class="fa-solid fa-bus"></i></div>
                            <div class="t-details">
                                <div class="t-title">
                                    <p>Origen: Pando</p>
                                    <p>Destino: Salinas</p>
                                </div>
                                <div class="t-time">
                                    <p>03.45 AM</p>
                                </div>
                            </div>
                        </div>

                        <div class="transaction">
                            <div class="t-icon-container">
                                <i class="fa-solid fa-bus"></i>
                            </div>
                            <div class="t-details">
                                <div class="t-title">
                                    <p>Origen: Pando</p>
                                    <p>Destino: Salinas</p>
                                </div>
                                <div class="t-time">
                                    <p>08.00PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('./components/navbar.php'); ?>
        <script src="../js/index.js" type="module"></script>
</body>


</html>