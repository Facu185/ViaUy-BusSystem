<?php
require "./database/db.php";
include_once "./controllers/discordErrorLog.php";
try {
    $user = $_SESSION[$_COOKIE["login"]];
    $patron = "/^[a-zA-Z0-9]+$/";
    $id_usuario = $user["ID_usuario"];
    $id_usuario = htmlspecialchars($id_usuario, ENT_QUOTES, 'UTF-8');
    if(!filter_var($id_usuario, FILTER_VALIDATE_INT)){
        echo '<script>alert("Debes iniciar sesion"); window.location.href = "./login"; </script>';
        exit;
    }
    $query = "SELECT ID_horario, ID_medio_de_pago, precio, estado, fecha_compra, numero_parada_origen, numero_parada_destino, fecha_viaje, asiento_seleccionado
    FROM pasaje
    WHERE ID_usuario = :id_usuario
    ORDER BY fecha_compra DESC
    LIMIT 3;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $sql->execute();
    $pasajes = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($pasajes as $pasaje) {
        $id_horario = $pasaje["ID_horario"];
        $id_horario = htmlspecialchars($id_horario, ENT_QUOTES, 'UTF-8');
        if(!filter_var($id_horario, FILTER_VALIDATE_INT)){
            echo '<script>alert("Debes proporcionar un horario valido"); window.location.href = "./login"; </script>';
            exit;
        }
        $id_medio_pago = $pasaje["ID_medio_de_pago"];
        $id_medio_pago = htmlspecialchars($id_medio_pago, ENT_QUOTES, 'UTF-8');
        if(!filter_var($id_medio_pago, FILTER_VALIDATE_INT)){
            echo '<script>alert("Debes proporcionar un medio de pago valido"); window.location.href = "./login"; </script>';
            exit;
        }
        $precio = $pasaje["precio"];
        $precio = htmlspecialchars($precio, ENT_QUOTES, 'UTF-8');
        if(!filter_var($precio, FILTER_VALIDATE_FLOAT)){
            echo '<script>alert("Debes proporcionar un precio valido"); window.location.href = "./login"; </script>';
        }
        $estado = $pasaje["estado"];
        $estado = htmlspecialchars($estado, ENT_QUOTES, 'UTF-8');
        if(!filter_var($estado, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $patron)))) {
            echo '<script>alert("Debes proporcionar un estado valido"); window.location.href = "./login"; </script>';
            exit;
        }
        $fecha_compra = $pasaje["fecha_compra"];
        $fecha_compra = htmlspecialchars($fecha_compra, ENT_QUOTES, 'UTF-8');
        $numero_parada_origen = $pasaje["numero_parada_origen"];
        $numero_parada_origen = htmlspecialchars($numero_parada_origen, ENT_QUOTES, 'UTF-8');
        if(!filter_var($numero_parada_origen, FILTER_VALIDATE_INT)){
            echo '<script>alert("Debes proporcionar un numero de parada de origen valido"); window.location.href = "./login"; </script>';
            exit;
        }
        $numero_parada_destino = $pasaje["numero_parada_destino"];
        $numero_parada_destino = htmlspecialchars($numero_parada_destino, ENT_QUOTES, 'UTF-8');
        if(!filter_var($numero_parada_destino, FILTER_VALIDATE_INT)){
            echo '<script>alert("Debes proporcionar un numero de parada de destino valido"); window.location.href = "./login"; </script>';
            exit;
        }
        $fecha_viaje = $pasaje["fecha_viaje"];
        $fecha_viaje = htmlspecialchars($fecha_viaje, ENT_QUOTES, 'UTF-8');
        $asiento_selecionado = $pasaje["asiento_seleccionado"];
        $asiento_selecionado = htmlspecialchars($asiento_selecionado, ENT_QUOTES, 'UTF-8');
        if(!filter_var($asiento_selecionado, FILTER_VALIDATE_INT)) {
            echo '<script>alert("Debes proporcionar un asiento valido"); window.location.href = "./login"; </script>';
            exit;
        }

        $query = "SELECT hora_salida, hora_llegada
        FROM horario
        WHERE ID_horario = :id_horario;";
        $sql = $conn->prepare($query);
        $sql->bindParam(':id_horario', $id_horario, PDO::PARAM_INT);
        $sql->execute();
        $horario = $sql->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT tipo_medio_pago
        FROM medio_de_pago
        WHERE ID_medio_pago= :id_medio_pago;";
        $sql = $conn->prepare($query);
        $sql->bindParam(':id_medio_pago', $id_medio_pago, PDO::PARAM_INT);
        $sql->execute();
        $pago = $sql->fetchAll(PDO::FETCH_ASSOC);
       

        $query = "SELECT localizacion
        FROM parada
        WHERE numero_parada = :numero_parada_origen or numero_parada = :numero_parada_destino;";
        $sql = $conn->prepare($query);
        $sql->bindParam(':numero_parada_origen', $numero_parada_origen, PDO::PARAM_INT);
        $sql->bindParam(':numero_parada_destino', $numero_parada_destino, PDO::PARAM_INT);
        $sql->execute();
        $localizacion = $sql->fetchAll(PDO::FETCH_ASSOC);
        $origen = $localizacion[0]["localizacion"];
        $origen = htmlspecialchars($origen, ENT_QUOTES, 'UTF-8');
       
        $destino = $localizacion[1]["localizacion"];
        $destino = htmlspecialchars($destino, ENT_QUOTES, 'UTF-8');
       
        $pasaje_usuario[] = array(
            'origen' => $origen,
            'destino' => $destino,
            'precio' => $precio,
            'estado' => $estado,
            'fecha_compra' => $fecha_compra,
            'fecha_viaje' => $fecha_viaje,
            'asiento_seleccionado' => $asiento_selecionado,
            'tipo_medio_pago' => $pago[0]["tipo_medio_pago"],
            'hora_salida' => $horario[0]["hora_salida"],
            'hora_llegada' => $horario[0]["hora_llegada"],
        );
        $_SESSION['pasajes'] = $pasaje_usuario; 
    }
} catch (Exception $e) {
    discordErrorLog('Error al buscar pasajes '. $user, $error);
    echo $e->getMessage();
}
$conn = null;
?>