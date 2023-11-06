<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "./database/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $linea = json_decode($_POST['linea']);
    $id_unidad=$linea->ID_unidad;
    $id_linea=$linea->idLinea;
    $asiento_selecionado = $_POST["asientoSeleccionado"];
    $fechaViaje = $linea->fechaViaje;
   

    $query = "SELECT ID_horario FROM horario WHERE ID_linea=:id_linea AND ID_unidad=:id_unidad;";
    $sql = $conn->prepare($query);
    $sql->bindParam(":id_linea", $id_linea);
    $sql->bindParam(":id_unidad", $id_unidad);
    $sql->execute();
    $horario = $sql->fetch(PDO::FETCH_ASSOC);
    $id_horario = $horario["ID_horario"];
   /*  print_r($id_horario); */
   
    $query = "SELECT disponibilidad_asiento FROM horario_asiento WHERE Numero_asiento=:asiento_selecionado AND fecha_viaje =:fechaViaje AND ID_horario=:id_horario AND ID_linea=:id_linea AND ID_unidad=:id_unidad;";
    $sql = $conn->prepare($query);
    $sql->bindParam(":id_linea", $id_linea);
    $sql->bindParam(":asiento_selecionado", $asiento_selecionado);
    $sql->bindParam(":fechaViaje", $fechaViaje);
    $sql->bindParam(":id_unidad", $id_unidad);
    $sql->bindParam(":id_horario", $id_horario);
    $sql->execute();
    $asientos_ocupados = $sql->fetch(PDO::FETCH_ASSOC);
    
    if (empty($asientos_ocupados) || $asientos_ocupados["disponibilidad_asiento"] == 1) {
        $infolinea = array(
            'origen_tramo' => $linea->origen_tramo,
            'destino_tramo' => $linea->destino_tramo,
            'asientos_seleccionado' => $asiento_selecionado,
            'hora_salida' => $linea->hora_salida,
            'hora_llegada' => $linea->hora_llegada,
            'caracteristicas' => $linea->caracteristicas,
            'ID_unidad' => $linea->ID_unidad,
            'precio' => $linea->precio,
            'idLinea' => $linea->idLinea,
            'fechaViaje' => $linea->fechaViaje,
            "parada_origen" => $linea->parada_origen,
            "parada_destino" => $linea->parada_destino,

        );
        $_SESSION['infolinea'] = $infolinea;    
       
        header("location: ../page/confirmarViaje");

    } else {
        echo '<script>alert("El asiento seleccionado ya no esta disponible");</script>';
        echo '<script>window.location.href = "location: ./comprar";</script>';
    }

}

?>