<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require "../database/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passage = json_decode($_POST['viaje']);
    $metodoPago = $_POST["forma_pago"];
    $id_usuario = $_SESSION["login"]["ID_usuario"];
    $email = $_SESSION["login"]["email"];
    $nombre = $_SESSION["login"]["nombre"];
    $apellido = $_SESSION["login"]["apellido"];
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
    $forma_viaje = $_POST["tipo_viaje"];
    $origen = $passage->origen_tramo;
    $destino = $passage->destino_tramo;
    if ($forma_viaje == "Ida y vuelta") {
        $precio = $precio * 2;
    }


    $metodoPago = $_POST["forma_pago"];
    $query = "SELECT ID_medio_pago FROM medio_de_pago WHERE tipo_medio_pago=:metodoPago";
    $sql = $conn->prepare($query);
    $sql->bindParam(':metodoPago', $metodoPago, PDO::PARAM_STR);
    $sql->execute();
    $id_medio_pago = $sql->fetchAll(PDO::FETCH_ASSOC);
    $id_pago = $id_medio_pago[0]["ID_medio_pago"];

    $query = "SELECT ID_horario FROM horario WHERE ID_linea=:id_linea AND ID_unidad=:id_unidad AND hora_salida=:hora_salida AND hora_llegada=:hora_llegada ;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':id_linea', $id_linea, PDO::PARAM_INT);
    $sql->bindParam(':id_unidad', $id_unidad, PDO::PARAM_INT);
    $sql->bindParam(':hora_salida', $hora_salida, PDO::PARAM_STR);
    $sql->bindParam(':hora_llegada', $hora_llegada, PDO::PARAM_STR);
    $sql->execute();
    $id_horarios = $sql->fetchAll(PDO::FETCH_ASSOC);
    $id_horario = $id_horarios[0]["ID_horario"];

    $query = "INSERT INTO horario_asiento (ID_horario, ID_linea, ID_unidad, Numero_asiento, fecha_viaje, disponibilidad_asiento) VALUES (:id_horario, :id_linea, :id_unidad, :asientos_seleccionado, :fecha_viaje, 0)";
    $sql = $conn->prepare($query);
    $sql->bindParam(":id_horario", $id_horario, PDO::PARAM_INT);
    $sql->bindParam(":id_unidad", $id_unidad, PDO::PARAM_INT);
    $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
    $sql->bindParam(":asientos_seleccionado", $asientos_seleccionado, PDO::PARAM_INT);
    $sql->bindParam(":fecha_viaje", $fecha_viaje, PDO::PARAM_STR);
    $sql->execute();

    if (isset($_POST['confirmar_reserva'])) {
        $query = "INSERT INTO pasaje(ID_horario, ID_medio_de_pago, ID_usuario, ID_linea, ID_unidad, precio, estado, fecha_compra, numero_parada_origen, numero_parada_destino, fecha_viaje, asiento_seleccionado) VALUES (:id_horario, :id_pago, :id_usuario, :id_linea, :id_unidad, :precio, 'Reservado', :fecha_actual, :parada_origen, :parada_destino, :fecha_viaje, :asientos_seleccionado );";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_horario", $id_horario, PDO::PARAM_INT);
        $sql->bindParam(":id_pago", $id_pago, PDO::PARAM_INT);
        $sql->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
        $sql->bindParam(":id_unidad", $id_unidad, PDO::PARAM_INT);
        $sql->bindParam(":precio", $precio, PDO::PARAM_INT);
        $sql->bindParam(":fecha_actual", $fecha_actual, PDO::PARAM_STR);
        $sql->bindParam(":parada_origen", $parada_origen, PDO::PARAM_INT);
        $sql->bindParam(":parada_destino", $parada_destino, PDO::PARAM_INT);
        $sql->bindParam(":fecha_viaje", $fecha_viaje, PDO::PARAM_STR);
        $sql->bindParam(":asientos_seleccionado", $asientos_seleccionado, PDO::PARAM_INT);
        $sql->execute();

        $query = "SELECT ID_pasaje FROM pasaje WHERE ID_horario=:id_horario AND ID_medio_de_pago=:id_pago AND ID_usuario=:id_usuario AND ID_linea=:id_linea AND ID_unidad=:id_unidad AND precio=:precio AND fecha_compra=:fecha_actual AND numero_parada_origen=:parada_origen AND numero_parada_destino=:parada_destino AND fecha_viaje=:fecha_viaje AND asiento_seleccionado=:asientos_seleccionado;";
        $sql = $conn->prepare($query);
        $sql->bindParam('id_horario', $id_horario, PDO::PARAM_INT);
        $sql->bindParam('id_pago', $id_pago, PDO::PARAM_INT);
        $sql->bindParam('id_usuario', $id_usuario, PDO::PARAM_INT);
        $sql->bindParam('id_linea', $id_linea, PDO::PARAM_INT);
        $sql->bindParam('id_unidad', $id_unidad, PDO::PARAM_INT);
        $sql->bindParam('precio', $precio, PDO::PARAM_INT);
        $sql->bindParam('fecha_actual', $fecha_actual, PDO::PARAM_STR);
        $sql->bindParam('parada_origen', $parada_origen, PDO::PARAM_INT);
        $sql->bindParam('parada_destino', $parada_destino, PDO::PARAM_INT);
        $sql->bindParam('fecha_viaje', $fecha_viaje, PDO::PARAM_STR);
        $sql->bindParam('asientos_seleccionado', $asientos_seleccionado, PDO::PARAM_INT);
        $sql->execute();
        $id_paseje_reserva = $sql->fetchAll(PDO::FETCH_ASSOC);

        $detalleViaje = array(
            'Numero de Pasaje' => $id_paseje_reserva[0]["ID_pasaje"],
            'Método de Pago' => $metodoPago,
            'Hora de Salida' => $hora_salida,
            'Hora de Llegada' => $hora_llegada,
            'Precio' => $precio,
            'Origen' => $origen,
            'Destino' => $destino,
            'Parada de Origen' => $parada_origen,
            'Parada de Destino' => $parada_destino,
            'Fecha del Viaje' => $fecha_viaje,
            'Asiento Seleccionado' => $asientos_seleccionado,
            'Fecha compra' => $fecha_actual,
            'Tipo de Viaje' => $forma_viaje
        );

        $_SESSION['detalleViaje'] = $detalleViaje;
        echo '<script>alert("Reserva realizada con éxito");</script>';
        echo '<script>setTimeout(function() {window.location.href = "../page/pdf";}, 1);</script>';
        echo '<script>setTimeout(function() {window.location.href = "../page/home";}, 200);</script>';



        /* $destinatario = "$email";
        $asunto = "Información del Viaje ViaUy";
        $mensaje = "Hola " . $nombre . " " . $apellido . ", muchas gracias por su compra. Esperamos que disfrute de su viaje.\n";
        $mensaje = "Detalles de la Reserva:\n\n";
        $mensaje .= "Numero de Pasaje: " . $id_paseje_reserva[0]["ID_pasaje"] . "\n";
        $mensaje .= "Método de Pago: " . $metodoPago . "\n";
        $mensaje .= "Hora de Salida: " . $hora_salida . "\n";
        $mensaje .= "Hora de Llegada: " . $hora_llegada . "\n";
        $mensaje .= "Precio: " . $precio . "\n";
        $mensaje .= "Origen: " . $origen . "\n";
        $mensaje .= "Destino: " . $destino . "\n";
        $mensaje .= "Parada de Origen: " . $parada_origen . "\n";
        $mensaje .= "Parada de Destino: " . $parada_destino . "\n";
        $mensaje .= "Fecha del Viaje: " . $fecha_viaje . "\n";
        $mensaje .= "Asientos Seleccionados: " . $asientos_seleccionado . "\n";
        $mensaje .= "Fecha compra: " . $fecha_actual . "\n";
        $mensaje .= "Tipo de Viaje: " . $forma_viaje;

        // Cabeceras del correo
        $headers = "From: viauy@example.com\r\n";
        $headers .= "Reply-To: viauy@example.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        @mail($destinatario, $asunto, $mensaje, $headers); */


    } elseif (isset($_POST['confirmar_compra'])) {
        $query = "INSERT INTO pasaje(ID_horario, ID_medio_de_pago, ID_usuario, ID_linea, ID_unidad, precio, estado, fecha_compra, numero_parada_origen, numero_parada_destino, fecha_viaje, asiento_seleccionado) VALUES (:id_horario, :id_pago, :id_usuario, :id_linea, :id_unidad, :precio, 'Comprado', :fecha_actual, :parada_origen, :parada_destino, :fecha_viaje, :asientos_seleccionado );";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_horario", $id_horario, PDO::PARAM_INT);
        $sql->bindParam(":id_pago", $id_pago, PDO::PARAM_INT);
        $sql->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
        $sql->bindParam(":id_unidad", $id_unidad, PDO::PARAM_INT);
        $sql->bindParam(":precio", $precio, PDO::PARAM_INT);
        $sql->bindParam(":fecha_actual", $fecha_actual, PDO::PARAM_STR);
        $sql->bindParam(":parada_origen", $parada_origen, PDO::PARAM_INT);
        $sql->bindParam(":parada_destino", $parada_destino, PDO::PARAM_INT);
        $sql->bindParam(":fecha_viaje", $fecha_viaje, PDO::PARAM_STR);
        $sql->bindParam(":asientos_seleccionado", $asientos_seleccionado, PDO::PARAM_INT);
        $sql->execute();

        $query = "SELECT ID_pasaje FROM pasaje WHERE ID_horario=:id_horario AND ID_medio_de_pago=:id_pago AND ID_usuario=:id_usuario AND ID_linea=:id_linea AND ID_unidad=:id_unidad AND precio=:precio AND fecha_compra=:fecha_actual AND numero_parada_origen=:parada_origen AND numero_parada_destino=:parada_destino AND fecha_viaje=:fecha_viaje AND asiento_seleccionado=:asientos_seleccionado;";
        $sql = $conn->prepare($query);
        $sql->bindParam('id_horario', $id_horario, PDO::PARAM_INT);
        $sql->bindParam('id_pago', $id_pago, PDO::PARAM_INT);
        $sql->bindParam('id_usuario', $id_usuario, PDO::PARAM_INT);
        $sql->bindParam('id_linea', $id_linea, PDO::PARAM_INT);
        $sql->bindParam('id_unidad', $id_unidad, PDO::PARAM_INT);
        $sql->bindParam('precio', $precio, PDO::PARAM_INT);
        $sql->bindParam('fecha_actual', $fecha_actual, PDO::PARAM_STR);
        $sql->bindParam('parada_origen', $parada_origen, PDO::PARAM_INT);
        $sql->bindParam('parada_destino', $parada_destino, PDO::PARAM_INT);
        $sql->bindParam('fecha_viaje', $fecha_viaje, PDO::PARAM_STR);
        $sql->bindParam('asientos_seleccionado', $asientos_seleccionado, PDO::PARAM_INT);
        $sql->execute();
        $id_paseje_compra = $sql->fetchAll(PDO::FETCH_ASSOC);

        $detalleViaje = array(
            'Numero de Pasaje' => $id_paseje_compra[0]["ID_pasaje"],
            'Método de Pago' => $metodoPago,
            'Hora de Salida' => $hora_salida,
            'Hora de Llegada' => $hora_llegada,
            'Precio' => $precio,
            'Origen' => $origen,
            'Destino' => $destino,
            'Parada de Origen' => $parada_origen,
            'Parada de Destino' => $parada_destino,
            'Fecha del Viaje' => $fecha_viaje,
            'Asiento Seleccionado' => $asientos_seleccionado,
            'Fecha compra' => $fecha_actual,
            'Tipo de Viaje' => $forma_viaje
        );

        $_SESSION['detalleViaje'] = $detalleViaje;
        echo '<script>alert("Compra realizada con éxito");</script>';
        echo '<script>setTimeout(function() {window.location.href = "../page/pdf";}, 1);</script>';
        echo '<script>setTimeout(function() {window.location.href = "../page/home";}, 200);</script>';

        /* $destinatario = "$email";
        $asunto = "Información del Viaje ViaUy";
        $mensaje = "Hola " . $nombre . " " . $apellido . ", muchas gracias por su compra. Esperamos que disfrute de su viaje.\n";
        $mensaje = "Detalles de la Reserva:\n\n";
        $mensaje .= "Numero de Pasaje: " . $id_paseje_reserva[0]["ID_pasaje"] . "\n";
        $mensaje .= "Método de Pago: " . $metodoPago . "\n";
        $mensaje .= "Hora de Salida: " . $hora_salida . "\n";
        $mensaje .= "Hora de Llegada: " . $hora_llegada . "\n";
        $mensaje .= "Precio: " . $precio . "\n";
        $mensaje .= "Origen: " . $origen . "\n";
        $mensaje .= "Destino: " . $destino . "\n";
        $mensaje .= "Parada de Origen: " . $parada_origen . "\n";
        $mensaje .= "Parada de Destino: " . $parada_destino . "\n";
        $mensaje .= "Fecha del Viaje: " . $fecha_viaje . "\n";
        $mensaje .= "Asientos Seleccionados: " . $asientos_seleccionado . "\n";
        $mensaje .= "Fecha compra: " . $fecha_actual . "\n";
        $mensaje .= "Tipo de Viaje: " . $forma_viaje;

        // Cabeceras del correo
        $headers = "From: viauy@example.com\r\n";
        $headers .= "Reply-To: viauy@example.com.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        @mail($destinatario, $asunto, $mensaje, $headers); */

    }
}
$conn = null;
?>