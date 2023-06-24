<?php 
    session_start();
    //#48BBED
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViaUy - Login</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
    <main class="login">
        <img src="./assets/login-img.png" alt="omnibus" class="login__image">
        <section class="login__menu">
            <h2 class="menu__welcome">Bienvenido</h2>
            <p class="menu__text">Ingrese para poder acceder a mas funcionalidades</p>
            <div class="login__form">
                <form action="submit" method="get">
                    <input type="email" id="loginEmail" name="email" placeholder="Email">
                    <input type="password" id="loginPassword" name="password" placeholder="Contraseña">
                    <button type="submit" class="button--primary">Ingresar</button>
                </form>
                <p class="login__register">No tienes una cuenta? Registrate <span>aqui.</span> </p>
            </div>
            <p class="login__conditions">Al hacer click en ingresar estas de acuerdo con los <span>terminos y condiciones.</span> </p>

        </section>
    </main>
</body>
</html>