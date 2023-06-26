<?php 
    session_start();
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
        <section class="register__menu"> 
            <h2 class="register__welcome">Bienvenido</h2>
            <p class="register__text">Debe registrarse para continuar.</p>
            <div class="register__form">
                <form action="submit" method="post">
                    <label for="registerName">Ingrese su nombre: </label>
                    <input type="text" id="registerName" name="registerName" placeholder="Nombre">
                    <label for="registerLastName">Ingrese su apellido: </label>
                    <input type="text" id="registerLastName" name="registerLastName" placeholder="Apellido">
                    <label for="registerPhone">Ingrese su número de telefono: </label>
                    <input type="number" id="registerPhone" name="registerPhone" placeholder="Numero de telefono">
                    <label for="registerEmail" >Ingrese su email: </label>
                    <input type="email" id="registerEmail" name="registerEmail" placeholder="Email">
                    <label for="registePassword">Ingrse su contraseña: </label>
                    <input type="password" id="registerPassword" name="registerPassword" placeholder="Contraseña">
                    <button class="button--primary" id="registerButton" type="button">Registrarse</button>
                </form>
            </div>
        </section>
    </main>
    <script src="../js/modules/createUser.js" type="module"></script>
</body>
</html>