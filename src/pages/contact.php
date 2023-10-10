<?php
if (!empty($_SESSION["login"])) {
    $login = $_SESSION["login"];
}
?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Formulario de contacto." />
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>ViaUY -Contacto</title>
</head>

<body>
    <main>
        <?php include('./components/menu.php'); ?>
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
    <?php include('./components/footer.php'); ?>
    <?php include('./components/navbar.php'); ?>
    <script src="../js/index.js" type="module"></script>
</body>

</html>