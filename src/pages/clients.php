<?php
include "./controllers/lookClient.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Eliminar cliente</p>
    <form method="post" action="./lookClient">
        <input type="email" name="clientEmail" placeholder="Email del cliente">
        <input type="submit" name="lookClient">
    </form>
    <?php if (!empty($_SESSION["usuario"])): ?>
        <p>
            ID usuario:
            <?php echo ($_SESSION["usuario"]["ID_usuario"]) ?>
        </p>
        <p>
            Email del usuario:
            <?php echo ($_SESSION["usuario"]["email"]) ?>
        </p>
        <p>
            Nombre del usuario:
            <?php echo ($_SESSION["usuario"]["nombre"]) ?>
        </p>
        <p>
            Apellido del usuario:
            <?php echo ($_SESSION["usuario"]["apellido"]) ?>
        </p>
        <p>
            Celular del usuario:
            <?php echo ($_SESSION["usuario"]["celular"]) ?>
        </p>
        <p>
           Esta activo: <?php if ($_SESSION["usuario"]["activo"] == 0) {
                echo "Si";
            } else
                echo "No"; ?>
        </p>
        <form method="post" action="./deleteClient">
            <input type="email" name="clientEmail" style="display: none;"
                value=" <?php echo ($_SESSION["usuario"]["email"]) ?>">
            <?php if ($_SESSION["usuario"]["activo"] == 0) {
                echo "<input type='submit' name='deleteClient' value='Eliminar usuario'>";
            } else
                echo "<input type='submit' name='activateClient' value='Activar usuario'>"; ?>

        </form>
    <?php endif; ?>

    <p>Gestionar reservas de un cliente</p>
    <form method="post" action="./confirmPassage">
        <input type="number" name="idPasaje" placeholder="Numero de pasaje">
        <input type="submit" name="eliminarPasaje" value="Eliminar pasaje">
    </form>
    <form method="post" action="./confirmPassage">
        <input type="number" name="idPasaje" placeholder="Numero de pasaje">
        <input type="number" name="pago" placeholder="Verificador de pago">
        <input type="submit" name="comprarPasaje" value="Comprar pasaje">
    </form>

</body>

</html>