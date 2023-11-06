<?php
require "./database/db.php";
try {
    if (!empty($_POST["deleteLine"])) {
        $nombre_linea = $_POST["nombreLinea"];

        $query = "SELECT ID_linea
          FROM linea
          WHERE nombre_linea = :nombre_linea";
        $sql = $conn->prepare($query);
        $sql->bindParam(":nombre_linea", $nombre_linea);
        $sql->execute();
        $id = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($id as $key => $value) {
            $id_linea = $id[$key]["ID_linea"];
            $query = "DELETE FROM recorre WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea);
            $sql->execute();

            $query = "DELETE FROM horario_asiento WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea);
            $sql->execute();

            $query = "DELETE FROM horario WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea);
            $sql->execute();

            $query = "DELETE FROM trabaja WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea);
            $sql->execute();

            $query = "DELETE FROM linea WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea);
            $sql->execute();
        }
        echo '<script>alert("La linea ah sido eliminada con exito"); window.location.href = "./delete"; </script>';
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>