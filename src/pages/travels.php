<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './controllers/travels.php';
    $search = true;
} else {
    $search = false;
}
if (!empty($_SESSION["login"])) {
    $login = $_SESSION["login"];
}
if (!empty($_SESSION["rol"])) {
    header('location: ./dashboard');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travels</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <?php include('./components/menu.php'); ?>
    <main class="main--travel">
        <section class="selected__travel">
            <p id="travelsSelected"></p>
            <div>
                <p>
                    <?php echo ($info_linea['origen_tramo']) ?>
                </p>
                <i class="fa-solid fa-arrow-right"></i>
                <p>
                    <?php echo ($info_linea['destino_tramo']) ?>
                </p>
            </div>
            <img src="../assets/travels-bus.webp" alt="bus">
        </section>
    </main>
    <section class="travel__cards">

        <?php foreach ($info_linea as $lineas): ?>
            <?php if (gettype($lineas) === "array"): ?>
                <?php foreach ($lineas as $unidad => $valor):
                    ?>
                    <?php if (gettype($unidad) === "integer"): ?>
                        <div class="travel__card">
                            <div class="tcard__header">
                                <p>Linea:
                                    <?php echo ($lineas['nombre_linea']) ?>
                                </p>
                                <a href=""></a>
                                <p class="sky">
                                    $
                                    <?php echo ($lineas['precio_total']) ?>
                                </p>
                            </div>
                            <p class="gray">
                                <?php echo ($valor['caracteristicas']) ?>
                            </p>
                            <p>
                                <?php echo ($valor['hora_salida']) ?> -
                                <?php echo ($valor['hora_llegada']) ?>
                            </p>
                            <p class="<?php echo ($valor['asientos_libres'] < 10 ? 'red' : 'green') ?>">
                                Asientos disponibles
                                <?php echo $valor['asientos_libres'] ?>
                            </p>

                            <form method="POST" action='./comprar'>
                                <input type="hidden" name="origen" value="<?php echo ($info_linea['origen_tramo']) ?>">
                                <input type="hidden" name="destino" value="<?php echo ($info_linea['destino_tramo']) ?>">
                                <input type="hidden" name="precio" value="<?php echo ($lineas["precio_total"]) ?>">
                                <input type="hidden" name="idLinea" value="<?php echo $lineas['id_linea'] ?>">
                                <input type="hidden" name="fechaViaje" value="<?php echo ($lineas["fecha_viaje"]) ?>">
                                <input type="hidden" name="parada_origen" value="<?php echo ($lineas["parada_origen"]) ?>">
                                <input type="hidden" name="parada_destino" value="<?php echo ($lineas["parada_destino"]) ?>">
                                <input type="hidden" name="asientos" value='<?php echo json_encode($valor); ?>'>
                                <?php if (isset($login)) {
                                    echo '<input type="submit"  class="button--primary" value="Comprar">';
                                } else {
                                    echo '<a href="./login">Loguearse</a>';
                                } ?>
                            </form>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>

        <?php endforeach ?>

    </section>

    <?php include('./components/navbar.php'); ?>
    <script src="../js/index.js" type="module"></script>
</body>

</html>