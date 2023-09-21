<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './controlers/travels.php';
    $search = true;
} else {
    $search = false;
}
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
    <header class="header--login">
        <h1 class='logoHead'>Via<span class='logoColor'>UY</span></h1>
        <div class="dropdowns">
            <div class="dropdown">
                <button type="button" class="dropbtn" id="travelLanguage"></button>
                <div class="dropdown-content">
                    <button type='button' id="enTravel"></button>
                    <button type='button' id="esTravel"></button>
                    <button type='button' id="prTravel"></button>
                </div>
            </div>
            <div class="dropdown">
                <button type="button" class="dropbtn" id="travelSesion"></button>
                <div class="dropdown-content">
                    <a type='button' id="travelLogin" href="./login.php"></a>
                    <a type='button' id="travelRegister" href="./register.php"></a>
                </div>
            </div>
        </div>
    </header>
    <header class="header--travel">
        <i class="fa-solid fa-filter"></i>
    </header>
    <main class="main--travel">
        <section class="selected__travel">
            <p id="travelsSelected"></p>
            <div>
                <p>
                    <?php echo ($info_linea['origen_tramo']) ?>
                </p>
                <i class="fa-solid fa-right-left"></i>
                <p>
                    <?php echo ($info_linea['destino_tramo']) ?>
                </p>
            </div>
            <img src="../assets/travels-bus.png" alt="bus">
        </section>
    </main>
    <section class="travel__cards">

        <?php foreach ($info_linea as $lineas):?>
            <?php if (gettype($lineas) === "array"): ?>
                <?php foreach ($lineas as $unidad => $valor):
                    ?>
                    <?php if (gettype($unidad) === "integer"): ?>
                        <div class="travel__card">
                            <div class="tcard__header">
                                <p>
                                    Linea:
                                    <?php echo ($lineas['nombre_linea']) ?>
                                </p>
                                <p class="sky">
                                    $
                                    <?php echo ($lineas['precio_total']) ?>
                                </p>
                            </div>
                            <p class="gray">
                                <?php echo ($valor['caracteristicas']) ?>
                            </p>
                            <p>
                                <?php echo ($valor['hora_salida']) ?> -
                                <?php echo ($valor['hora_llegada']) ?>
                            </p>
                            <p class="<?php echo ($valor['asientos_libres'] < 10 ? 'red' : 'green') ?>">
                                <?php echo $valor['asientos_libres'] ?> Asientos disponibles
                            </p>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>


        <?php endforeach ?>

    </section>
    <nav class="nav__bar">
        <div class="home">
            <a href="./home.php">
                <i class="fa-solid fa-house-user"></i>
                <div class="home__text">
                    <p id="travelsHome" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="travels">
            <a href="./travels.php">
                <i class="fa-solid fa-bus"></i>
                <div class="travels__text">
                    <p id="travelsGo" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="routes">
            <a href="">
                <i class="fa-solid fa-map-location-dot"></i>
                <div class="routes__text">
                    <p id="travelsRoutes" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="porfile">
            <a href="./profile.php">
                <i class="fa-regular fa-user"></i>
                <div class="porfile__text">
                    <p id="travelsProfile" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="about__us">
            <a href="./aboutUs.php">
                <i class="fa-solid fa-users"></i>
                <div class="about__us__text">
                    <p id="travelsAbout" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="services">
            <a href="./services.php">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <div class="services__text">
                    <p id="travelsService" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
        <div class="contact">
            <a href="./contact.php">
                <i class="fa-solid fa-comments"></i>
                <div class="contact__text">
                    <p id="travelsContact" class="nav__bar__text"></p>
                </div>
            </a>
        </div>
    </nav>

    <script src="../js/index.js" type="module"></script>
</body>

</html>