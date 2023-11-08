<?php
require "./database/db.php";

try {
    if (!empty($_POST["modifyRoute"])) {
        $id_linea = $_POST["lines"];
        $id_tramo = $_POST["numeroParadaOrigen"];
        $origen_tramo = $_POST["origenTramo"];
        $destino_tramo = $_POST["destinoTramo"];

        $query = "UPDATE recorre SET origen_tramo=:origen_tramo, destino_tramo=:destino_tramo WHERE ID_linea=:id_linea AND ID_tramo=:id_tramo";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_linea", $id_linea);
        $sql->bindParam(":id_tramo", $id_tramo);
        $sql->bindParam(":origen_tramo", $origen_tramo);
        $sql->bindParam(":destino_tramo", $destino_tramo);
        $sql->execute();
        echo '<script>alert("Recorrido editado con exito"); window.location.href = "./modify"; </script>';
    }
    if (!empty($_POST["deleteRoute"])) {
        $id_linea = $_POST["lines"];
        $id_tramo = $_POST["numeroParadaOrigen"];

        $query = "DELETE FROM recorre WHERE ID_linea=:id_linea AND ID_tramo=:id_tramo";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_linea", $id_linea);
        $sql->bindParam(":id_tramo", $id_tramo);
        $sql->execute();
        echo '<script>alert("Recorrido eliminado con exito"); window.location.href = "./modify"; </script>';
    }

} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}

?>