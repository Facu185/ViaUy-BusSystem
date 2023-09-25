<?php
if (!empty($_SESSION["login"])) {
    $login = $_SESSION["login"];
}
include_once './controlers/buyTicket.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Comprar pasaje</title>
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<?php include('./components/menu.php'); ?>
<main class="main--travel">
    <section class="selected__travel">
        <?php if (!empty($info_linea)): ?>
            <p id="seattxt"></p>
            <div>
                <p>
                    <?php 
                    echo ($info_linea['origen_tramo']) ?>
                </p>
                <i class="fa-solid fa-arrow-right"></i>
                <p>
                    <?php echo ($info_linea['destino_tramo']) ?>
                </p>
            </div>
            <img src="../assets/travels-bus.png" alt="bus">
        </section>
        <section class='travel__seats'>
            <p id="seatSelected" class="select__title" ></p>
            <div class="seats__container">
                <?php foreach ($info_linea['asientos'] as $asiento): ?>
                    <div class="seats__seat <?php if ($asiento->disponibilidad == 1) {
                        echo ('seat__avaiable');
                    } else {
                        echo ('seat__unavaiable');
                    } ?>" id="<?php echo ('asiento_' . $asiento->Numero_asiento) ?>">
                        <p>
                            <?php echo ($asiento->Numero_asiento); ?>
                        </p>
                    </div>
                <?php endforeach ?>
            </div>
            <form method="POST" action="./seat">
                <select id="asiento" name="asientoSeleccionado" type='text'>
                    <?php foreach ($info_linea['asientos'] as $disponible): ?>
                        <?php if ($disponible->disponibilidad == 1): ?>
                            <option selected>
                                <?php echo ($disponible->Numero_asiento); ?>
                            </option>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
            <input type="hidden" name="linea" value='<?php echo json_encode($info_linea); ?>'>
            <input id="seatbutton" class="button--primary" id="homeButton" type="submit" >
        </form>
    </section>
</main>

<?php include('./components/navbar.php'); ?>
<script src="../js/index.js" type="module"></script>
<script src="../js/modules/seleccionarAsiento.js" type="module"></script>
</body>

</html>