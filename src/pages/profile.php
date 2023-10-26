<?php
$pasaje_usuario = $_SESSION['pasajes']; 
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
                                    <p>Origen: <?php echo $pasaje_usuario[0]["origen"] ?></p>
                                    <p>Destino: <?php echo $pasaje_usuario[0]["destino"] ?></p>
                                    <p>$<?php echo $pasaje_usuario[0]["precio"] ?></p>
                                    <p><?php echo $pasaje_usuario[0]["estado"] ?></p>
                                    <p><?php echo $pasaje_usuario[0]["tipo_medio_pago"] ?></p>
                                </div>
                                <div class="t-time">
                                    <p><?php echo $pasaje_usuario[0]["hora_salida"] ?></p>
                                    <p><?php echo $pasaje_usuario[0]["hora_llegada"] ?></p>
                                    <p><?php echo $pasaje_usuario[0]["fecha_compra"] ?></p>
                                    <p><?php echo $pasaje_usuario[0]["fecha_viaje"] ?></p>
                                    <p><?php echo $pasaje_usuario[0]["asiento_seleccionado"] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="transaction">
                            <div class="t-icon-container"><i class="fa-solid fa-bus"></i></div>
                            <div class="t-details">
                                <div class="t-title">
                                    <p>Origen: <?php echo $pasaje_usuario[1]["origen"] ?></p>
                                    <p>Destino: <?php echo $pasaje_usuario[1]["destino"] ?></p>
                                    <p>$<?php echo $pasaje_usuario[1]["precio"] ?></p>
                                    <p><?php echo $pasaje_usuario[1]["estado"] ?></p>
                                    <p><?php echo $pasaje_usuario[1]["tipo_medio_pago"] ?></p>
                                </div>
                                <div class="t-time">
                                    <p><?php echo $pasaje_usuario[1]["hora_salida"] ?></p>
                                    <p><?php echo $pasaje_usuario[1]["hora_llegada"] ?></p>
                                    <p><?php echo $pasaje_usuario[1]["fecha_compra"] ?></p>
                                    <p><?php echo $pasaje_usuario[1]["fecha_viaje"] ?></p>
                                    <p><?php echo $pasaje_usuario[1]["asiento_seleccionado"] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="transaction">
                            <div class="t-icon-container">
                                <i class="fa-solid fa-bus"></i>
                            </div>
                            <div class="t-details">
                                <div class="t-title">
                                    <p>Origen: <?php echo $pasaje_usuario[2]["origen"] ?></p>
                                    <p>Destino: <?php echo $pasaje_usuario[2]["destino"] ?></p>
                                    <p>$<?php echo $pasaje_usuario[2]["precio"] ?></p>
                                    <p><?php echo $pasaje_usuario[2]["estado"] ?></p>
                                    <p><?php echo $pasaje_usuario[2]["tipo_medio_pago"] ?></p>
                                </div>
                                <div class="t-time">
                                    <p><?php echo $pasaje_usuario[2]["hora_salida"] ?></p>
                                    <p><?php echo $pasaje_usuario[2]["hora_llegada"] ?></p>
                                    <p><?php echo $pasaje_usuario[2]["fecha_compra"] ?></p>
                                    <p><?php echo $pasaje_usuario[2]["fecha_viaje"] ?></p>
                                    <p><?php echo $pasaje_usuario[2]["asiento_seleccionado"] ?></p>
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