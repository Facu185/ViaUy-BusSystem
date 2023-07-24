<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Formulario de contacto." />
    <meta name="keywords" content="Veterinaria, Veterinarias en montevideo, perro, gato, mascotas, animales" />
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>ViaUY -Contacto</title>
</head>

<body>
    <main>
        <section class="contact">
            <div class="contact__banner">
                <h2 id="contactForm"> <span id="contactFormSpan"></span></h2>
                <p id="contactFormttx"> </p>
            </div>
            <div class="contact__form">
                <form>
                    <input type="text" name="name" id="contactName" placeholder="Nombre" />
                    <input type="email" name="email" placeholder="Email" />
                    <input type="text" name="subjet" id="contactSubject" placeholder="Asunto" />
                    <textarea name="message" rows="10" id="contactMessage" placeholder="Mensaje "></textarea>
                    <button type="submit" class="button--secondary" id="contactButton"></button>
                </form>
            </div>
        </section>
    </main>
    <footer class="footer">
        <h3>Via<span>UY</span></h3>
        <div class="footer__bottom">
            <div class="footer__column1">
                <p id="contactCopy">
                     <span>ViaUY</span>
                </p>
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
                    <p id="contactHome"></p>
                </div>
            </a>
        </div>
        <div class="travels">
            <a href="./travels.php">
                <i class="fa-solid fa-bus"></i>
                <div class="travels__text">
                    <p id="contactTravel"></p>
                </div>
            </a>
        </div>
        <div class="routes">
            <a href="">
                <i class="fa-solid fa-map-location-dot"></i>
                <div class="routes__text">
                    <p id="contactRoutes"></p>
                </div>
            </a>
        </div>
        <div class="porfile">
            <a href="./profile.php">
                <i class="fa-regular fa-user"></i>
                <div class="porfile__text">
                    <p id="contactPorfile"></p>
                </div>
            </a>
        </div>
        <div class="about__us">
                <a href="./aboutUs.php">
                    <i class="fa-solid fa-users"></i>
                    <div class="about__us__text">
                        <p id="contactAbout"></p>
                    </div>
                </a>
            </div>
            <div class="services">
                <a href="./services.php">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <div class="services__text">
                        <p id="contactService"></p>
                    </div>
                </a>
            </div>
            <div class="contact">
                <a href="./contact.php">
                    <i class="fa-solid fa-comments"></i>
                    <div class="contact__text">
                        <p id="contactContact"></p>
                    </div>
                </a>
            </div>
    </nav>
    <script src="../js/index.js" type="module"></script>
</body>

</html>