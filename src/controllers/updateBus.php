<?php
require "./database/db.php";
try {
    if (!empty($_POST["updateBus"])) {
        $matricula = $_POST["matricula"];
        $nueva_matricula = $_POST["nuevaMatricula"];
        $cantidad_asientos = $_POST["cantAsientos"];
        $tipo_asientos = $_POST["tipoAsientos"];
        $caracteristicas = $_POST["caracteristicas"];

        $query = "SELECT ID_unidad FROM unidad WHERE ID_unidad = :nueva_matricula";
        $sql = $conn->prepare($query);
        $sql->bindParam(":nueva_matricula", $nueva_matricula);
        $sql->execute();
        $id = $sql->fetch(PDO::FETCH_ASSOC);
        $id_unidad = $id["ID_unidad"];
        if ($id_unidad == $nueva_matricula) {
            echo '<script>alert("Esta unidad ya existe"); window.location.href = "./addBus"; </script>';
        }
        $query = "DELETE FROM asiento WHERE ID_unidad = :matricula";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula);
        $sql->execute();

        $query = "DELETE FROM caracteristicas WHERE ID_unidad = :matricula";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula);
        $sql->execute();

        $query = "UPDATE unidad SET ID_unidad=:nueva_matricula, total_de_asientos=:cantidad_asientos WHERE ID_unidad = :matricula";
        $sql = $conn->prepare($query);
        $sql->bindParam(":nueva_matricula", $nueva_matricula);
        $sql->bindParam(":matricula", $matricula);
        $sql->bindParam(":cantidad_asientos", $cantidad_asientos);
        $sql->execute();

        $query = "INSERT INTO caracteristicas (ID_unidad, tipo) VALUES (:nueva_matricula, :caracteristicas)";
        $sql = $conn->prepare($query);
        $sql->bindParam(":nueva_matricula", $nueva_matricula);
        $sql->bindParam(":caracteristicas", $caracteristicas);
        $sql->execute();

        for ($i = 1; $i <= $cantidad_asientos; $i++) {
            $query = "INSERT INTO asiento (Numero_asiento, ID_unidad, tipo_asiento) VALUES (:i, :nueva_matricula, :tipo_asientos)";
            $sql = $conn->prepare($query);
            $sql->bindParam(":nueva_matricula", $nueva_matricula);
            $sql->bindParam(":i", $i);
            $sql->bindParam(":tipo_asientos", $tipo_asientos);
            $sql->execute();
        }

        echo '<script>alert("Unidad modificada con exito"); window.location.href = "./dashboard"; </script>';
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>