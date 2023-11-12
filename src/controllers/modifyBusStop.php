<?php 
require "./database/db.php";
try {
    if (!empty($_POST["modifyBusStop"])) {
        $numero_parada = $_POST["numeroParadaOrigen"];
        $localizacion = $_POST["localizacion"];
        $latitud = $_POST["latitud"];
        $longitud = $_POST["longitud"];
        if(empty($numero_parada) || empty($localizacion) || empty($latitud) || empty($longitud) || !is_int($numero_parada)) {
            echo '<script>alert("Falta completar campos"); window.location.href = "./modifyBusStop"; </script>';
            exit;
        }

        $query = "UPDATE parada SET Localizacion=:localizacion, latitud=:latitud, longitud=:longitud WHERE Numero_parada=:numero_parada";
        $sql = $conn->prepare($query);
        $sql->bindParam(":localizacion", $localizacion);
        $sql->bindParam(":latitud", $latitud);
        $sql->bindParam(":longitud", $longitud);
        $sql->bindParam(":numero_parada", $numero_parada);
        $sql->execute();

        echo '<script>alert("Parada modificada con exito"); window.location.href = "./modifyBusStop"; </script>';
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>