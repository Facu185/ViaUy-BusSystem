<?php
require "./database/db.php";
try {
    if (!empty($_POST["deleteBus"])) {
        $matricula = $_POST["matricula"];
        

        $query = "DELETE FROM caracteristicas WHERE ID_unidad=:matricula";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula);
        $sql->execute();

        $query = "SELECT ID_linea FROM horario WHERE ID_unidad=:matricula";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula);
        $sql->execute();
        $id = $sql->fetch(PDO::FETCH_ASSOC);
        $id_linea = $id["ID_linea"];
        print_r($id_linea);

        $query = "DELETE FROM horario WHERE ID_unidad=:matricula AND ID_linea=:id_linea";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula);
        $sql->bindParam(":id_linea", $id_linea);
        $sql->execute();

        $query = "DELETE FROM horario_asiento WHERE ID_unidad=:matricula AND ID_linea=:id_linea";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula);
        $sql->bindParam(":id_linea", $id_linea);
        $sql->execute();

        $query = "DELETE FROM asiento WHERE ID_unidad=:matricula";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula);
        $sql->execute();

        $query = "DELETE FROM unidad WHERE ID_unidad=:matricula";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula);
        $sql->execute();
        echo '<script>alert("Unidad eliminada con exito"); window.location.href = "./delete"; </script>';
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>