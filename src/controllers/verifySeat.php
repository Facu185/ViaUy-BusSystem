<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "./database/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $linea = json_decode($_POST['linea']);
    
    $id_unidad=$linea->ID_unidad;
    $asiento_selecionado = $_POST["asientoSeleccionado"];
    $query = "SELECT Numero_asiento, disponibilidad FROM asiento WHERE Numero_asiento = :asiento_selecionado AND ID_unidad= :id_unidad";
    $sql = $conn->prepare($query);
    $sql->bindParam(":asiento_selecionado", $asiento_selecionado);
    $sql->bindParam(":id_unidad", $id_unidad);
    $sql->execute();
    $disponibilidadAsiento = $sql->fetch(PDO::FETCH_ASSOC);
    $numeroAsiento = $disponibilidadAsiento["Numero_asiento"];
    $disponibilidad = $disponibilidadAsiento["disponibilidad"];
    
    if ($asiento_selecionado == $numeroAsiento && $disponibilidad === 1) {
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