<?php
require "./database/db.php";
try {
    $user = $_SESSION["login"];
    $id_usuario = $user["ID_usuario"];
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
        $id_medio_pago = $pasaje["ID_medio_de_pago"];
        $precio = $pasaje["precio"];
        $estado = $pasaje["estado"];
        $fecha_compra = $pasaje["fecha_compra"];
        $numero_parada_origen = $pasaje["numero_parada_origen"];
        $numero_parada_destino = $pasaje["numero_parada_destino"];
        $fecha_viaje = $pasaje["fecha_viaje"];
        $asiento_selecionado = $pasaje["asiento_seleccionado"];

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
        $destino = $localizacion[1]["localizacion"];
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
    echo $e->getMessage();
}
$conn = null;
?>