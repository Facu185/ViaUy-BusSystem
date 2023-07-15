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
            <div class="welcome__text">
                <h2 class="main__text">Bienvenido</h2>
                <p>A donde quieres ir?</p>
            </div>
            <img src="../assets/home-bus.png" alt="bus">
        </section>
        <div class="container">
            <section class="main__selector">
                <input type="text" placeholder="Origen">
                <i class="fa-solid fa-arrows-up-down"></i>
                <input type="text" placeholder="Destino">
                <input id="input__date" type="date" placeholder="Fecha">
                <button class="button--primary">Buscar pasajes</button>
            </section>
        </div>
        <section class="main__travels">
            <h2 class="main__text">Viajes frecuentes.</h2>
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
                                    <p>Punto de partida</p>
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
                                    <p>Punto de Llegada</p>
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
                <i class="fa-solid fa-house-user"></i>
                <div class="home__text">
                    <p>Incio</p>
                </div>
            </div>
            <div class="travels">
                <i class="fa-solid fa-bus"></i>
                <div class="travels__text">
                    <p>Viajes</p>
                </div>
            </div>
            <div class="routes">
                <i class="fa-solid fa-map-location-dot"></i>
                <div class="routes__text">
                    <p>Rutas</p>
                </div>
            </div>
            <div class="porfile">
                <i class="fa-regular fa-user"></i>
                <div class="porfile__text">
                    <p>Perfil</p>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>