<?php
require "./database/db.php";

try {
    if (!empty($_POST["modifyLine"])) {
        $id_linea = $_POST["lines"];
        $nombre_linea = $_POST["nombreLinea"];
        $origen_linea = $_POST["origenLinea"];
        $destino_linea = $_POST["destinoLinea"];
        if(empty($id_linea) || empty($nombre_linea) || empty($origen_linea) || empty($destino_linea) || !is_numeric($id_linea)) {
            echo '<script>alert("Faltan completar campos"); window.location.href = "./modifyLinePage"; </script>';
            exit;
        }

        $query = "SELECT nombre_linea FROM linea WHERE nombre_linea =:nombre_linea";
        $sql = $conn->prepare($query);
        $sql->bindParam(":nombre_linea", $nombre_linea, PDO::PARAM_STR);
        $sql->execute();
        $linea = $sql->fetch(PDO::FETCH_ASSOC);
        $nombre = $linea["nombre_linea"];
        if ($nombre == $nombre_linea) {
            echo '<script>alert("Esta linea ya existe"); window.location.href = "./modifyLinePage"; </script>';
        }
        if (!empty($nombre_linea) && !empty($origen_linea) && !empty($destino_linea)) {
            $query = "UPDATE linea SET nombre_linea=:nombre_linea, origen_linea=:origen_linea, destino_linea=:destino_linea WHERE Id_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":nombre_linea", $nombre_linea, PDO::PARAM_STR);
            $sql->bindParam(":origen_linea", $origen_linea, PDO::PARAM_STR);
            $sql->bindParam(":destino_linea", $destino_linea, PDO::PARAM_STR);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->execute();

            echo '<script>alert("Linea modificada con exito"); window.location.href = "./modifyLinePage"; </script>';
        }
        if (!empty($nombre_linea)) {
            $query = "UPDATE linea SET nombre_linea=:nombre_linea WHERE Id_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":nombre_linea", $nombre_linea, PDO::PARAM_STR);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->execute();

            echo '<script>alert("Linea modificada con exito"); window.location.href = "./modifyLinePage"; </script>';
        }
        if (!empty($origen_linea)) {
            $query = "UPDATE linea SET origen_linea=:origen_linea WHERE Id_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":origen_linea", $origen_linea, PDO::PARAM_STR);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->execute();

            echo '<script>alert("Linea modificada con exito"); window.location.href = "./modifyLinePage"; </script>';
        }
        if (!empty($origen_linea)) {
            $query = "UPDATE linea SET destino_linea=:destino_linea WHERE Id_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":destino_linea", $destino_linea, PDO::PARAM_STR);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->execute();

            echo '<script>alert("Linea modificada con exito"); window.location.href = "./modifyLinePage"; </script>';
        }
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
$conn = null;
?>