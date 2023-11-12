<?php
require "./database/db.php";

try {
    if (!empty($_POST["eliminarPasaje"])) {
        $id_pasaje = $_POST["idPasaje"];
        if (empty($id_pasaje)) {
            echo '<script>alert("Faltan completar datos"); window.location.href = "./manageReservations"; </script>';
            exit;
        }
        $query = "SELECT estado FROM pasaje WHERE ID_pasaje =:id_pasaje";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_pasaje", $id_pasaje, PDO::PARAM_INT);
        $sql->execute();
        $estados = $sql->fetch(PDO::FETCH_ASSOC);
        $estado = $estados["estado"];
        if ($estado != "Reservado") {
            echo '<script>alert("El pasaje no puede ser cancelado"); window.location.href = "./manageReservations"; </script>';
            
        } else {
            $query = "UPDATE pasaje SET estado = 'Cancelado' WHERE ID_pasaje =:id_pasaje";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_pasaje", $id_pasaje, PDO::PARAM_INT);
            $sql->execute();
            echo '<script>alert("Pasaje cancelado con exito"); window.location.href = "./manageReservations"; </script>';
        }

    }
    if (!empty($_POST["comprarPasaje"])) {
        $id_pasaje = $_POST["idPasaje"];
        $pago = $_POST["pago"];
        if (empty($pago) || empty($id_pasaje)) {
            echo '<script>alert("Faltan completar datos"); window.location.href = "./manageReservations"; </script>';
            exit;
        }
        $query = "SELECT estado FROM pasaje WHERE ID_pasaje =:id_pasaje";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_pasaje", $id_pasaje, PDO::PARAM_INT);
        $sql->execute();
        $estados = $sql->fetch(PDO::FETCH_ASSOC);
        $estado = $estados["estado"];
        if ($estado != "Reservado") {
            echo '<script>alert("El pasaje no puede ser comprado"); window.location.href = "./manageReservations"; </script>';
        } else {
            $query = "UPDATE pasaje SET estado = 'Reservado-Comprado' WHERE ID_pasaje =:id_pasaje";
            $sql = $conn->prepare($query);
            $sql->bindParam(":id_pasaje", $id_pasaje, PDO::PARAM_INT);
            $sql->execute();
            echo '<script>alert("Pasaje comprado con exito"); window.location.href = "./manageReservations"; </script>';
        }

    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
$conn = null;
?>