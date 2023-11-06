<?php
ob_start();
if (!empty($_SESSION["login"]) && isset($_SESSION['detalleViaje'])) {
    $detalleViaje = $_SESSION['detalleViaje'];
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
    <title>Document</title>
    <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
    <div class="confirm___travel" style="margin: none;">
        <h1 class='logoHead'>Via<span class='logoColor'>UY</span></h1>
        <h1>Informacion del viaje</h1>
        <div class="confirm__grid">
            <p>
                Numero de pasaje:
                <?php echo ($detalleViaje["Numero de Pasaje"]); ?>
            </p>
            <p>
                Método de pago:
                <?php echo ($detalleViaje["Método de Pago"]); ?>
            </p>
            <p>
                Hora de salida:
                <?php echo ($detalleViaje["Hora de Salida"]); ?>
            </p>
            <p>
                Hora de llegada:
                <?php echo ($detalleViaje["Hora de Llegada"]); ?>
            </p>
            <p>
                Precio:
                $
                <?php echo ($detalleViaje["Precio"]); ?>
            </p>
            <p>
                Origen:
                <?php echo ($detalleViaje["Origen"]); ?>
            </p>
            <p>
                Parada de origen:
                <?php echo ($detalleViaje["Parada de Origen"]); ?>
            </p>
            <p>
                Destino:
                <?php echo ($detalleViaje["Destino"]); ?>
            </p>
            <p>
                Parada de destino:
                <?php echo ($detalleViaje["Parada de Destino"]); ?>
            </p>
            <p>
                Fecha de viaje:
                <?php echo ($detalleViaje["Fecha del Viaje"]); ?>
            </p>
            <p>
                Asiento seleccionado:
                <?php echo ($detalleViaje["Asiento Seleccionado"]); ?>
            </p>
            <p>
                Fecha de compra:
                <?php echo ($detalleViaje["Fecha compra"]); ?>
            </p>
            <p>
                Tipo de viaje:
                <?php echo ($detalleViaje["Tipo de Viaje"]); ?>
            </p>
        </div>
    </div>
</body>

</html>
<?php

$html = ob_get_clean();
require_once './libraries/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$css = file_get_contents("./styles/main.css"); 
$html = '<style>' . $css . '</style>' . $html;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper("a4", "portrait");
$dompdf->render();
$dompdf->stream("detalle_viaje.pdf", array("Attachment" => true));
?>

