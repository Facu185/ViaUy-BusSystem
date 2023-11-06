<?php 
require "./database/db.php";
try {
    if (!empty($_POST["addBusStop"])) {
        $numero_parada = $_POST["numeroParada"];
        $localizacion = $_POST["localizacion"];
        $latitud = $_POST["latitud"];
        $longitud = $_POST["longitud"];
        
        $query = "SELECT Numero_parada FROM parada WHERE numero_parada = :numero_parada";
        $sql = $conn->prepare($query);
        $sql->bindParam(":numero_parada", $numero_parada);
        $sql->execute();
        $id = $sql->fetch(PDO::FETCH_ASSOC);
        print_r ($id);
        $id_parada = $id["Numero_parada"];
        if ($id_parada == $numero_parada) {
            echo '<script>alert("Esta parada ya existe"); window.location.href = "./busStop"; </script>';
        }

        $query = "INSERT INTO parada (Numero_parada, Localizacion, latitud, longitud) VALUES (:numero_parada, :localizacion, :latitud, :longitud)";
        $sql = $conn->prepare($query);
        $sql->bindParam(":numero_parada", $numero_parada);
        $sql->bindParam(":localizacion", $localizacion);
        $sql->bindParam(":latitud", $latitud);
        $sql->bindParam(":longitud", $longitud);
        $sql->execute();

        echo '<script>alert("Parada añadida con exito"); window.location.href = "./dashboard"; </script>';
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>