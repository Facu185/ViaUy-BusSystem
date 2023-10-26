<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require "../database/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passage = json_decode($_POST['viaje']);
    $metodoPago = $_POST["forma_pago"];
    $id_usuario = $_SESSION["login"]["ID_usuario"];
    $id_linea = $passage->idLinea;
    $hora_salida = $passage->hora_salida;
    $hora_llegada = $passage->hora_llegada;
    $id_unidad = $passage->ID_unidad;
    $precio = $passage->precio;
    $parada_origen = $passage->parada_origen;
    $parada_destino = $passage->parada_destino;
    $fecha_viaje = $passage->fechaViaje;
    $asientos_seleccionado = $passage->asientos_seleccionado;
    $fecha_actual = date('Y-m-d');
 
    $metodoPago = $_POST["forma_pago"];
    $query = "SELECT ID_medio_pago FROM medio_de_pago WHERE tipo_medio_pago=:metodoPago";
    $sql = $conn->prepare($query);
    $sql->bindParam(':metodoPago', $metodoPago);
    $sql->execute();
    $id_medio_pago = $sql->fetchAll(PDO::FETCH_ASSOC);
    $id_pago = $id_medio_pago[0]["ID_medio_pago"];

    $query = "SELECT ID_horario FROM horario WHERE ID_linea=:id_linea AND ID_unidad=:id_unidad AND hora_salida=:hora_salida AND hora_llegada=:hora_llegada ;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':id_linea', $id_linea);
    $sql->bindParam(':id_unidad', $id_unidad);
    $sql->bindParam(':hora_salida', $hora_salida);
    $sql->bindParam(':hora_llegada', $hora_llegada);
    $sql->execute();
    $id_horarios = $sql->fetchAll(PDO::FETCH_ASSOC);
  
    $id_horario = $id_horarios[0]["ID_horario"];

    $query = "UPDATE asiento SET disponibilidad=0 WHERE ID_unidad=:id_unidad AND Numero_asiento=:asientos_seleccionado";
    $sql = $conn->prepare($query);
    $sql->bindParam(":id_unidad", $id_unidad);
    $sql->bindParam(":asientos_seleccionado", $asientos_seleccionado);
    $sql->execute();

    if (isset($_POST['confirmar_reserva'])) {
        $query = "INSERT INTO pasaje(ID_horario, ID_medio_de_pago, ID_usuario, ID_linea, ID_unidad, precio, estado, fecha_compra, numero_parada_origen, numero_parada_destino, fecha_viaje, asiento_seleccionado) VALUES (:id_horario, :id_pago, :id_usuario, :id_linea, :id_unidad, :precio, 'Reservado', :fecha_actual, :parada_origen, :parada_destino, :fecha_viaje, :asientos_seleccionado );";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_horario", $id_horario);
        $sql->bindParam(":id_pago", $id_pago);
        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->bindParam(":id_linea", $id_linea);
        $sql->bindParam(":id_unidad", $id_unidad);
        $sql->bindParam(":precio", $precio);
        $sql->bindParam(":fecha_actual", $fecha_actual);
        $sql->bindParam(":parada_origen", $parada_origen);
        $sql->bindParam(":parada_destino", $parada_destino);
        $sql->bindParam(":fecha_viaje", $fecha_viaje);
        $sql->bindParam(":asientos_seleccionado", $asientos_seleccionado);
        $sql->execute();
        echo '<script>alert("Reserva realizada con exito");</script>';
        echo '<script>window.location.href = "../page/home";</script>';
       
    } elseif (isset($_POST['confirmar_compra'])) {
        $query = "INSERT INTO pasaje(ID_horario, ID_medio_de_pago, ID_usuario, ID_linea, ID_unidad, precio, estado, fecha_compra, numero_parada_origen, numero_parada_destino, fecha_viaje, asiento_seleccionado) VALUES (:id_horario, :id_pago, :id_usuario, :id_linea, :id_unidad, :precio, 'Comprado', :fecha_actual, :parada_origen, :parada_destino, :fecha_viaje, :asientos_seleccionado );";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_horario", $id_horario);
        $sql->bindParam(":id_pago", $id_pago);
        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->bindParam(":id_linea", $id_linea);
        $sql->bindParam(":id_unidad", $id_unidad);
        $sql->bindParam(":precio", $precio);
        $sql->bindParam(":fecha_actual", $fecha_actual);
        $sql->bindParam(":parada_origen", $parada_origen);
        $sql->bindParam(":parada_destino", $parada_destino);
        $sql->bindParam(":fecha_viaje", $fecha_viaje);
        $sql->bindParam(":asientos_seleccionado", $asientos_seleccionado);
        $sql->execute();
        echo '<script>alert("Compra realizada con exito");</script>';
        echo '<script>window.location.href = "../page/home";</script>';
       
    }
}
?>