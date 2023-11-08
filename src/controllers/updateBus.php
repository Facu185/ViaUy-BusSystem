<?php
require "./database/db.php";
try {
    if (!empty($_POST["updateBus"])) {
        $matricula = $_POST["matricula"];

        $cantidad_asientos = $_POST["cantAsientos"];
        $tipo_asientos = $_POST["tipoAsientos"];
        $caracteristicas = $_POST["caracteristicas"];
        if (!empty($cantidad_asientos)) {
            if (!empty($tipo_asientos)) {
                $query = "SELECT total_de_asientos FROM unidad WHERE ID_unidad = :matricula";
                $sql = $conn->prepare($query);
                $sql->bindParam(":matricula", $matricula);
                $sql->execute();
                $total_de_asientos = $sql->fetch(PDO::FETCH_ASSOC);
                $asientos = $total_de_asientos["total_de_asientos"];
                if ($cantidad_asientos > $asientos) {
                    $query = "UPDATE unidad SET total_de_asientos=:cantidad_asientos WHERE ID_unidad = :matricula";
                    $sql = $conn->prepare($query);
                    $sql->bindParam(":matricula", $matricula);
                    $sql->bindParam(":cantidad_asientos", $cantidad_asientos);
                    $sql->execute();

                    for ($i = $asientos + 1; $i <= $cantidad_asientos; $i++) {
                        $query = "INSERT INTO asiento (Numero_asiento, ID_unidad, tipo_asiento) VALUES (:i, :matricula, :tipo_asientos)";
                        $sql = $conn->prepare($query);
                        $sql->bindParam(":matricula", $matricula);
                        $sql->bindParam(":i", $i);
                        $sql->bindParam(":tipo_asientos", $tipo_asientos);
                        $sql->execute();
                    }
                    echo '<script>alert("Unidad modificada con exito"); window.location.href = "./modify"; </script>';
                }
            } elseif ($cantidad_asientos < $asientos) {
                $query = "UPDATE unidad SET total_de_asientos=:cantidad_asientos WHERE ID_unidad = :matricula";
                $sql = $conn->prepare($query);
                $sql->bindParam(":matricula", $matricula);
                $sql->bindParam(":cantidad_asientos", $cantidad_asientos);
                $sql->execute();

                for ($i = $asientos; $i >= $cantidad_asientos + 1; $i--) {
                    $query = "DELETE FROM asiento WHERE ID_unidad = :matricula AND Numero_asiento = :i";
                    $sql = $conn->prepare($query);
                    $sql->bindParam(":matricula", $matricula);
                    $sql->bindParam(":i", $i);
                    $sql->execute();
                }
                echo '<script>alert("Unidad modificada con exito"); window.location.href = "./modify"; </script>';
            } elseif ($cantidad_asientos == $asientos) {
                echo '<script>alert("La unidad ya tiene esa cantidad de asientos asignados"); window.location.href = "./modify"; </script>';
            } else {
                echo '<script>alert("Debe ingresar el tipo de asiento"); window.location.href = "./modify"; </script>';
            }
        }
        if (!empty($tipo_asientos)) {
            $query = "UPDATE asiento SET tipo_asiento=:tipo_asientos WHERE ID_unidad = :matricula";
            $sql = $conn->prepare($query);
            $sql->bindParam(":matricula", $matricula);
            $sql->bindParam(":tipo_asientos", $tipo_asientos);
            $sql->execute();
            echo '<script>alert("Unidad modificada con exito"); window.location.href = "./modify"; </script>';
        }
        if (!empty($caracteristicas)) {
            $query = "UPDATE caracteristicas SET tipo=:caracteristicas WHERE ID_unidad = :matricula";
            $sql = $conn->prepare($query);
            $sql->bindParam(":matricula", $matricula);
            $sql->bindParam(":caracteristicas", $caracteristicas);
            $sql->execute();
            echo '<script>alert("Unidad modificada con exito"); window.location.href = "./modify"; </script>';
        }
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>