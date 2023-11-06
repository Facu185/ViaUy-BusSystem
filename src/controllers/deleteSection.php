<?php
require "./database/db.php";
try {
    if (!empty($_POST["deleteSection"])) {
        $parada_origen = $_POST["numeroParadaOrigen"];
        $parada_destino = $_POST["numeroParadaDestino"];

        $query = "SELECT ID_tramo
        FROM tramo
        WHERE numero_parada_1 IN (:parada_origen)
        OR numero_parada_2 IN (:parada_destino)";
        $sql = $conn->prepare($query);
        $sql->bindParam(":parada_origen", $parada_origen);
        $sql->bindParam(":parada_destino", $parada_destino);
        $sql->execute();
        $id = $sql->fetchAll(PDO::FETCH_ASSOC);
        $id_tramo = $id[0]["ID_tramo"];
        $query = "DELETE FROM recorre WHERE ID_tramo=:id_tramo";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_tramo", $id_tramo);
        $sql->execute();

        $query = "DELETE FROM tramo WHERE ID_tramo=:id_tramo";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_tramo", $id_tramo);
        $sql->execute();

        echo '<script>alert("El tramo ah sido eliminado con exito"); window.location.href = "./delete"; </script>';
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>