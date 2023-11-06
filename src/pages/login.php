<?php
session_start();
include "./controllers/signin.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViaUy - Login</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <main class="login">
        <img src="../assets/login-img.webp" alt="omnibus" class="login__image">

        <section class="login__menu">
            <h2 class="menu__welcome" id="loginWelcome"></h2>
            <p class="menu__text" id="loginMessage"></p>
            <div class="login__form">
                <form method="post">
                    <input type="email" id="loginEmail" name="email" placeholder="Email">
                    <input type="password" id="loginPassword" name="password" placeholder="Contraseña">
                    <input type="submit" class="button--primary" id="loginButton" name="loginButton"
                        value="Ingresar"></input>
                </form>
                <p class="login__register" id="loginNoAccount"><a href="./register" id="loginGoRegister"></a></p>
                
            </div>
            <p class="login__conditions" id="loginTerms"><span id="loginConditions"></span> </p>

        </section>
    </main>
    <script src="../js/index.js" type="module"></script>
</body>

</html>