<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $asientos = json_decode($_POST['asientos']);
    $info_linea = array(
        'origen_tramo' => $_POST['origen'],
        'destino_tramo' => $_POST['destino'],
        'asientos' => $asientos->info_asientos,
        "hora_salida" => $asientos->hora_salida,
        "hora_llegada" => $asientos->hora_llegada,
        "caracteristicas" => $asientos->caracteristicas,
        'ID_unidad' => $asientos->info_asientos[0]->ID_unidad,
        'precio' => $_POST["precio"],
        'idLinea' => $_POST["idLinea"], 
        "fechaViaje"=> $_POST["fechaViaje"],
        "parada_origen"=> $_POST["parada_origen"],
        "parada_destino"=> $_POST["parada_destino"],
    );
}
?>