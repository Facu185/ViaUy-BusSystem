<?php
require "./database/db.php";

try {
    if (!empty($_POST["addRoute"])) {
        $id_linea = $_POST["lines"];
        $tramo_anterior = $_POST["tramoAnterior"];
        $tramo_agregar = $_POST["tramoAgregar"];
        $origen_tramo = $_POST["origenTramo"];
        $destino_tramo = $_POST["destinoTramo"];
        if(empty($id_linea) || empty($tramo_anterior) || empty($tramo_agregar) || empty($origen_tramo) || empty($destino_tramo) || !is_numeric($id_linea) || !is_numeric($tramo_anterior) || !is_numeric($tramo_agregar)) {
            echo '<script>alert("Falatan agregar datos"); window.location.href = "./addNewRoutePage"; </script>';
        }
        $query = "SELECT ID_tramo FROM recorre WHERE ID_tramo =:tramo_agregar";
        $sql = $conn->prepare($query);
        $sql->bindParam(":tramo_agregar", $tramo_agregar);
        $sql->execute();
        $tramo_repetido = $sql->fetch(PDO::FETCH_ASSOC);
        if(!empty($tramo_repetido)){
            echo '<script>alert("Este tramo ya esta en esta linea"); window.location.href = "./addNewRoutePage"; </script>';
        }

        $query = "SELECT orden_tramos FROM recorre WHERE ID_tramo =:tramo_anterior";
        $sql = $conn->prepare($query);
        $sql->bindParam(":tramo_anterior", $tramo_anterior);
        $sql->execute();
        $orden_tramos = $sql->fetch(PDO::FETCH_ASSOC);
        $orden = $orden_tramos["orden_tramos"];
        $orden = $orden + 1;
      
      

        $query = "SELECT MAX(orden_tramos) FROM recorre WHERE ID_linea = :id_linea";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_linea", $id_linea);
        $sql->execute();
        $tramos = $sql->fetch(PDO::FETCH_ASSOC);
        $ultimo_orden = $tramos["MAX(orden_tramos)"];
     
        for ($i=$ultimo_orden+1; $i >= $orden+1; $i--) {
            $orden_anterior=$i-1;
            $query = "UPDATE recorre SET orden_tramos=:i WHERE ID_linea=:id_linea AND orden_tramos=:orden_anterior";
            $sql = $conn->prepare($query);
            $sql->bindParam(":i", $i);
            $sql->bindParam(":id_linea", $id_linea);
            $sql->bindParam(":orden_anterior", $orden_anterior);
            $sql->execute();
            
        }
        $query = "INSERT INTO recorre (ID_linea, ID_tramo, origen_tramo, destino_tramo, orden_tramos) VALUES (:id_linea, :tramo_agregar, :origen_tramo, :destino_tramo, :orden)";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_linea", $id_linea);
        $sql->bindParam(":tramo_agregar", $tramo_agregar);
        $sql->bindParam(":origen_tramo", $origen_tramo);
        $sql->bindParam(":destino_tramo", $destino_tramo);
        $sql->bindParam(":orden", $orden);
        $sql->execute();
        echo '<script>alert("Recorrido modificado con exito"); window.location.href = "./addNewRoutePage"; </script>';

    }

} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}

?>