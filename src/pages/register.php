<?php 
    session_start();
    include "../controlers/signup.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViaUy - Register</title>
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
    <main class="register">
       <h1>Via<span>UY</span></h1>
        <section class="register__menu"> 
            <h2 class="register__welcome" id="registerWelcome"></h2>
            <p class="register__text" id="registerMessage"></p>
            <div class="register__form">
                <form method="post">
                    <label for="registerName" id="registerTextName"> </label>
                    <input type="text" id="registerName" name="registerName" placeholder="Nombre">
                    <label for="registerLastName" id="registerTextLastName"> </label>
                    <input type="text" id="registerLastName" name="registerLastName" placeholder="Apellido">
                    <label for="registerPhone" id="registerTextPhone"> </label>
                    <input type="number" id="registerPhone" name="registerPhone" placeholder="Numero de telefono">
                    <label for="registerEmail" id="registerTextEmail"> </label>
                    <input type="email" id="registerEmail" name="registerEmail" placeholder="Email">
                    <label for="registerPassword" id="registerTextPassword"> </label>
                    <input type="password" id="registerPassword" name="registerPassword" placeholder="Contraseña">
                    <input class="button--primary" id="registerButton" type="submit" name="registerButton" value="Registrarse">
                </form>
            </div>
        </section>
    </main>
    <script src="../js/index.js" type="module"></script>
</body>
</html>