<?php
require "./database/db.php";

try {
    if (!empty($_POST["addRoute"])) {
        $nombre_linea = $_POST["nombreLinea"];
        $origen_linea = $_POST["origenLinea"];
        $destino_linea = $_POST["destinoLinea"];
        if (empty($nombre_linea) || empty($origen_linea) || empty($destino_linea)) {
            echo '<script>alert("Faltan completar datos"); window.location.href = "./addRoutes"; </script>';
            exit;
        }
        $query = "SELECT nombre_linea FROM linea WHERE nombre_linea =:nombre_linea";
        $sql = $conn->prepare($query);
        $sql->bindParam(":nombre_linea", $nombre_linea, PDO::PARAM_STR);
        $sql->execute();
        $linea = $sql->fetch(PDO::FETCH_ASSOC);
        if (!empty($linea)) {
            echo '<script>alert("Esta linea ya existe"); window.location.href = "./addRoutes"; </script>';
            exit;
        }
      
        $query = "INSERT INTO linea (nombre_linea, origen_linea, destino_linea) VALUES (:nombre_linea, :origen_linea, :destino_linea)";
        $sql = $conn->prepare($query);
        $sql->bindParam(":nombre_linea", $nombre_linea, PDO::PARAM_STR);
        $sql->bindParam(":origen_linea", $origen_linea, PDO::PARAM_STR);
        $sql->bindParam(":destino_linea", $destino_linea, PDO::PARAM_STR);
        $sql->execute();

        $query = "SELECT ID_linea FROM linea WHERE nombre_linea =:nombre_linea";
        $sql = $conn->prepare($query);
        $sql->bindParam(":nombre_linea", $nombre_linea, PDO::PARAM_STR);
        $sql->execute();
        $id = $sql->fetch(PDO::FETCH_ASSOC);
        $id_linea = $id["ID_linea"];

        $contador = 3;
        $contador2 = 0;

        if ($contador2 == 0) {
            $contador2 = '';
        }

        $arr = array($_POST);
        $arr_forms = array_slice($arr[0], 0);
        $rep = (count($arr_forms) - 4) / 3;

        for ($a = 1; $a <= $rep; $a++) {
            $length = $contador + 2;

            for ($i = $contador; $i <= $length; $i++) {
                $id_tramo = $_POST["numeroParadaOrigen" . $contador2];
                $origen_tramo = $_POST["origenTramo" . $contador2];
                $destino_tramo = $_POST["destinoTramo" . $contador2];
                $contador++;
                if(empty($nombre_linea) || empty($origen_linea) || empty($destino_linea)|| empty($id_linea) || empty($id_tramo)|| empty($origen_tramo) || empty($destino_tramo) || !is_numeric($id_tramo)){
                    echo '<script>alert("Faltan completar datos"); window.location.href = "./addRoutes"; </script>';
                    exit;
                }
            }
            
            $contador2++;
            $query = "INSERT INTO recorre (ID_linea, ID_tramo, origen_tramo, destino_tramo, orden_tramos) VALUES (:id_linea, :id_tramo, :origen_tramo, :destino_tramo, :contador2)";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->bindParam(":id_tramo", $id_tramo, PDO::PARAM_INT);
            $sql->bindParam(":origen_tramo", $origen_tramo, PDO::PARAM_STR);
            $sql->bindParam(":destino_tramo", $destino_tramo, PDO::PARAM_STR);
            $sql->bindParam(":contador2", $contador2, PDO::PARAM_INT);
            $sql->execute();
        }
        echo '<script>alert("Recoorrido añadido con exito"); window.location.href = "./addRoutes"; </script>';

    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
$conn = null;
?>