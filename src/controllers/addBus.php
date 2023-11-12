<?php
require "./database/db.php";
try {
    if (!empty($_POST["addBusButton"])) {
        
        $matricula = $_POST["matricula"];
        $cantidad_asientos = $_POST["cantAsientos"];
        $tipo_asientos = $_POST["tipoAsientos"];
        $caracteristicas = $_POST["caracteristicas"];
        if (empty($matricula) || empty($cantidad_asientos) || empty($caracteristicas) || empty($tipo_asientos)) {
            echo '<script>alert("Faltan completar datos"); window.location.href = "./addBus"; </script>';
        }
        $query = "SELECT ID_unidad FROM unidad WHERE ID_unidad = :matricula";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula, PDO::PARAM_STR);
        $sql->execute();
        $id = $sql->fetch(PDO::FETCH_ASSOC);
        $id_unidad = $id["ID_unidad"];
        if ($id_unidad == $matricula) {
            echo '<script>alert("Esta unidad ya existe"); window.location.href = "./addBus"; </script>';
        }

        $query = "INSERT INTO unidad (ID_unidad, ID_empresa, total_de_asientos) VALUES (:matricula, 1, :cantidad_asientos)";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula, PDO::PARAM_STR);
        $sql->bindParam(":cantidad_asientos", $cantidad_asientos, PDO::PARAM_STR);
        $sql->execute();

        $query = "INSERT INTO caracteristicas (ID_unidad, tipo) VALUES (:matricula, :caracteristicas)";
        $sql = $conn->prepare($query);
        $sql->bindParam(":matricula", $matricula, PDO::PARAM_STR);
        $sql->bindParam(":caracteristicas", $caracteristicas, PDO::PARAM_STR);
        $sql->execute();

        for ($i = 1; $i <= $cantidad_asientos; $i++) {
            $query = "INSERT INTO asiento (Numero_asiento, ID_unidad, tipo_asiento) VALUES (:i, :matricula, :tipo_asientos)";
            $sql = $conn->prepare($query);
            $sql->bindParam(":matricula", $matricula, PDO::PARAM_STR);
            $sql->bindParam(":i", $i, PDO::PARAM_INT);
            $sql->bindParam(":tipo_asientos", $tipo_asientos, PDO::PARAM_STR);
            $sql->execute();
        }
        echo '<script>alert("Unidad añadida con exito"); window.location.href = "./dashboard"; </script>';
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
$conn = null;
?>