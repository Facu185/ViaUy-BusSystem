<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require "../database/db.php";
include_once "../controllers/discordErrorLog.php";
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $passage = json_decode($_POST['viaje']);
        $metodoPago = $_POST["forma_pago"];
        $patron = "/^[a-zA-Z0-9]+$/";
        $id_usuario = $_SESSION["login"]["ID_usuario"];
        $id_usuario = htmlspecialchars($id_usuario, ENT_QUOTES, 'UTF-8');
        $email = $_SESSION["login"]["email"];
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

        $nombre = $_SESSION["login"]["nombre"];
        $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');

        $apellido = $_SESSION["login"]["apellido"];
        $apellido = htmlspecialchars($apellido, ENT_QUOTES, 'UTF-8');

        $id_linea = $passage->idLinea;
        $id_linea = htmlspecialchars($id_linea, ENT_QUOTES, 'UTF-8');
        if (!filter_var($id_linea, FILTER_VALIDATE_INT)) {
            echo '<script>alert("El id de la linea no es valido"); window.location.href = "./confirmarViaje"; </script>';
            exit;
        }
        $hora_salida = $passage->hora_salida;
        $hora_salida = htmlspecialchars($hora_salida, ENT_QUOTES, 'UTF-8');
        $hora_llegada = $passage->hora_llegada;
        $hora_llegada = htmlspecialchars($hora_llegada, ENT_QUOTES, 'UTF-8');
        $id_unidad = $passage->ID_unidad;
        $id_unidad = htmlspecialchars($id_unidad, ENT_QUOTES, 'UTF-8');
        if (!filter_var($id_unidad, FILTER_VALIDATE_INT)) {
            echo '<script>alert("El id de la unidad no es valido"); window.location.href = "./confirmarViaje"; </script>';
            exit;
        }
        $precio = $passage->precio;
        $precio = htmlspecialchars($precio, ENT_QUOTES, 'UTF-8');
        if (!filter_var($precio, FILTER_VALIDATE_FLOAT)) {
            echo '<script>alert("El precio no es valido"); window.location.href = "./confirmarViaje"; </script>';
            exit;
        }
        $parada_origen = $passage->parada_origen;
        $parada_origen = htmlspecialchars($parada_origen, ENT_QUOTES, 'UTF-8');
        if (!filter_var($parada_origen, FILTER_VALIDATE_INT)) {
            echo '<script>alert("La parada de origen no es valida"); window.location.href = "./confirmarViaje"; </script>';
            exit;
        }
        $parada_destino = $passage->parada_destino;
        $parada_destino = htmlspecialchars($parada_destino, ENT_QUOTES, 'UTF-8');
        if (!filter_var($parada_destino, FILTER_VALIDATE_INT)) {
            echo '<script>alert("La parada de destino no es valida"); window.location.href = "./confirmarViaje"; </script>';
            exit;
        }
        $fecha_viaje = $passage->fechaViaje;
        $fecha_viaje = htmlspecialchars($fecha_viaje, ENT_QUOTES, 'UTF-8');
        $asientos_seleccionado = $passage->asientos_seleccionado;
        $asientos_seleccionado = htmlspecialchars($asientos_seleccionado, ENT_QUOTES, 'UTF-8');
        if (!filter_var($asientos_seleccionado, FILTER_VALIDATE_INT)) {
            echo '<script>alert("El numero de asientos no es valido"); window.location.href = "./confirmarViaje"; </script>';
            exit;
        }
        $fecha_actual = date('Y-m-d');
        $fecha_actual = htmlspecialchars($fecha_actual, ENT_QUOTES, 'UTF-8');
        $origen = $passage->origen_tramo;
        $origen = htmlspecialchars($origen, ENT_QUOTES, 'UTF-8');

        $destino = $passage->destino_tramo;
        $destino = htmlspecialchars($destino, ENT_QUOTES, 'UTF-8');



        $metodoPago = $_POST["forma_pago"];
        $metodoPago = htmlspecialchars($metodoPago, ENT_QUOTES, 'UTF-8');
        if (empty($metodoPago) || empty($id_usuario) || empty($email) || empty($nombre) || empty($apellido) || empty($id_linea) || empty($hora_salida) || empty($hora_llegada) || empty($id_unidad) || empty($precio) || empty($parada_origen) || empty($parada_destino) || empty($fecha_viaje) || empty($asientos_seleccionado) || empty($fecha_actual) || empty($origen) || empty($destino)) {
            echo '<script>alert("Faltan completar datos"); window.location.href = "./confirmarViaje"; </script>';
            exit;
        }

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

            $destinatario = "$email";
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

            // Cabeceras del correo
            $headers = "From: viauy@example.com\r\n";
            $headers .= "Reply-To: viauy@example.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            @mail($destinatario, $asunto, $mensaje, $headers);

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
            );

            $_SESSION['detalleViaje'] = $detalleViaje;
            echo '<script>alert("Reserva realizada con éxito");</script>';
            echo '<script>setTimeout(function() {window.location.href = "../page/pdf";}, 1);</script>';
            echo '<script>setTimeout(function() {window.location.href = "../page/home";}, 200);</script>';


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

            $destinatario = "$email";
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
         
            $headers = "From: viauy@example.com\r\n";
            $headers .= "Reply-To: viauy@example.com.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
    
            @mail($destinatario, $asunto, $mensaje, $headers);


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

            );

            $_SESSION['detalleViaje'] = $detalleViaje;
            echo '<script>alert("Compra realizada con éxito");</script>';
            echo '<script>setTimeout(function() {window.location.href = "../page/pdf";}, 1);</script>';
            echo '<script>setTimeout(function() {window.location.href = "../page/home";}, 300);</script>';

            
        }
    }
} catch (Exception $error) {
    discordErrorLog('Error al reservar o comprar pasaje' . $id_unidad, $error);
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
$conn = null;
?>