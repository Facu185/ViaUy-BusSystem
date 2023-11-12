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
        if(!is_int($id_tramo) || !is_int($tipo_tramo)){
            echo '<script>alert("Faltan completar datos"); window.location.href = "./modifySectionPage"; </script>';
        }
        if (!empty($tipo_tramo) && !empty($distancia) && !empty($tiempo_viaje) && !empty($calles) && !empty($rutas)) {
            $query = "UPDATE tramo SET tipo_tramo=:tipo_tramo, distancia=:distancia, calles=:calles, rutas=:rutas, tiempo=:tiempo_viaje WHERE ID_tramo = :id_tramo";
            $sql = $conn->prepare($query);
            $sql->bindParam(":tipo_tramo", $tipo_tramo, PDO::PARAM_INT);
            $sql->bindParam(":distancia", $distancia, PDO::PARAM_INT);
            $sql->bindParam(":calles", $calles, PDO::PARAM_STR);
            $sql->bindParam(":rutas", $rutas, PDO::PARAM_STR);
            $sql->bindParam(":tiempo_viaje", $tiempo_viaje, PDO::PARAM_STR);
            $sql->bindParam(":id_tramo", $id_tramo, PDO::PARAM_INT);
            $sql->execute();
            echo '<script>alert("Tramo editado con exito"); window.location.href = "./modifySectionPage"; </script>';
        } else {
            if (!empty($tipo_tramo)) {
                $query = "UPDATE tramo SET tipo_tramo=:tipo_tramo WHERE ID_tramo = :id_tramo";
                $sql = $conn->prepare($query);
                $sql->bindParam(":tipo_tramo", $tipo_tramo, PDO::PARAM_INT);
                $sql->bindParam(":id_tramo", $id_tramo, PDO::PARAM_INT);
                $sql->execute();
                echo '<script>alert("Tramo editado con exito"); window.location.href = "./modifySectionPage"; </script>';
            }
            if (!empty($distancia)) {
                $query = "UPDATE tramo SET distancia=:distancia WHERE ID_tramo = :id_tramo";
                $sql = $conn->prepare($query);
                $sql->bindParam(":distancia", $distancia, PDO::PARAM_INT);
                $sql->bindParam(":id_tramo", $id_tramo, PDO::PARAM_INT);
                $sql->execute();
                echo '<script>alert("Tramo editado con exito"); window.location.href = "./modifySectionPage"; </script>';
            }
            if (!empty($tiempo_viaje)) {
                $query = "UPDATE tramo SET tiempo=:tiempo_viaje WHERE ID_tramo = :id_tramo";
                $sql = $conn->prepare($query);
                $sql->bindParam(":tiempo_viaje", $tiempo_viaje, PDO::PARAM_STR);
                $sql->bindParam(":id_tramo", $id_tramo, PDO::PARAM_INT);
                $sql->execute();
                echo '<script>alert("Tramo editado con exito"); window.location.href = "./modifySectionPage"; </script>';
            }
            if (!empty($calles)) {
                $query = "UPDATE tramo SET calles=:calles WHERE ID_tramo = :id_tramo";
                $sql = $conn->prepare($query);
                $sql->bindParam(":calles", $calles, PDO::PARAM_STR);
                $sql->bindParam(":id_tramo", $id_tramo, PDO::PARAM_INT);
                $sql->execute();
            }
            if (!empty($rutas)) {
                $query = "UPDATE tramo SET rutas=:rutas WHERE ID_tramo = :id_tramo";
                $sql = $conn->prepare($query);
                $sql->bindParam(":rutas", $rutas, PDO::PARAM_STR);
                $sql->bindParam(":id_tramo", $id_tramo, PDO::PARAM_INT);
                $sql->execute();
                echo '<script>alert("Tramo editado con exito"); window.location.href = "./modifySectionPage"; </script>';
            }
        }
    }

} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
$conn = null;
?>