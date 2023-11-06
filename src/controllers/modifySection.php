<?php
require "./database/db.php";

try {
    if (!empty($_POST["modifySection"])) {
        $id_tramo = $_POST["numeroParadaOrigen"];
        $tipo_tramo = $_POST["tipoTramo"];
        $distancia = $_POST["distancia"];
        $tiempo_viaje = $_POST["tiempoViaje"];
        $calles = $_POST["calles"];
        $rutas = $_POST["rutas"];

        $query = "UPDATE tramo SET tipo_tramo=:tipo_tramo, distancia=:distancia, calles=:calles, rutas=:rutas, tiempo=:tiempo_viaje WHERE ID_tramo = :id_tramo";
        $sql = $conn->prepare($query);
        $sql->bindParam(":tipo_tramo", $tipo_tramo);
        $sql->bindParam(":distancia", $distancia);
        $sql->bindParam(":calles", $calles);
        $sql->bindParam(":rutas", $rutas);
        $sql->bindParam(":tiempo_viaje", $tiempo_viaje);
        $sql->bindParam(":id_tramo", $id_tramo);
        $sql->execute();

        echo '<script>alert("Tramo editado con exito"); window.location.href = "./modify"; </script>';
    }

} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>