<?php
require "./database/db.php";
try {
    if (!empty($_POST["deleteLine"])) {
        $id_linea = $_POST["nombreLinea"];
        if(empty($id_linea) || !is_numeric($id_linea)) {
            echo '<script>alert("Falata completar datos"); window.location.href = "./deleteLinePage"; </script>';
            exit;
        }
        foreach ($id as $key => $value) {
            $id_linea = $id[$key]["ID_linea"];
            $query = "DELETE FROM recorre WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->execute();

            $query = "DELETE FROM horario_asiento WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->execute();

            $query = "DELETE FROM horario WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->execute();

            $query = "DELETE FROM trabaja WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->execute();

            $query = "DELETE FROM linea WHERE ID_linea=:id_linea";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
            $sql->execute();
        }
        echo '<script>alert("La linea ah sido eliminada con exito"); window.location.href = "./deleteLinePage"; </script>';
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
$conn = null;
?>