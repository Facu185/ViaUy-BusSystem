<?php

if (!empty($_SESSION["login"]) && isset($_SESSION['infolinea'])) {
    $login = $_SESSION["login"];
    $infolinea = $_SESSION['infolinea'];
} else {
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar viaje</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <?php include('./components/menu.php'); ?>
    <div class="confirm___travel">
        <h1 id="confirmTitle"></h1>
       <div class="confirm__grid">
       <h3 id="confirmOrigin"> </h3>
        <p>
            <?php echo ($infolinea["origen_tramo"]); ?>
        </p>
        <h3 id="confirmDestination"> </h3>
        <p>
            <?php echo ($infolinea["destino_tramo"]); ?>
        </p>
        <h3 id="confimSeat"></h3>
        <p>
            <?php echo ($infolinea["asientos_seleccionado"]); ?>
        </p>
        <h3 id="hourStart"></h3>
        <p>
            <?php echo ($infolinea["hora_salida"]); ?>
        </p>
        <h3 id="hourArraival"></h3>
        <p>
            <?php echo ($infolinea["hora_llegada"]); ?>
        </p>
        <h3 id="confirmCaracteristics"> </h3>
        <p>
            <?php echo ($infolinea["caracteristicas"]); ?>
        </p>
        <h3 id="confirmPrice"></h3>
        <p>
            <?php echo ($infolinea["precio"]); ?>
        </p>
        <h3 id="confirmDate"></h3>
        <p>
            <?php echo ($infolinea["fechaViaje"]); ?>
        </p>
        <form method='POST' action='../controllers/passage.php'>
            <input type="hidden" name="viaje" value='<?php echo json_encode($infolinea); ?>'>
            <h3 id="comfimPayment"></h3>
            <select name="forma_pago" id="forma_pago">
                <option id="creditPayment" value="Pagar con tarjeta de crédito"></option>
                <option id="debitPayment" value="Pagar con tarjeta de débito"></option>
                <option id="cashPayment" value="Pagar en efectivo"></option>
            </select>
            <input id="booking" type='submit' class='button--primary' name='confirmar_reserva' value='Confirmar reserva'>
            <input id="confirmBuy" type='submit' class='button--primary' name='confirmar_compra' value='Confirmar compra'>
        </form>
       </div>
    </div>
    <?php include('./components/navbar.php'); ?>
    <script src="../js/index.js" type="module"></script>
</body>

</html>