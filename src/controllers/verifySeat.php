<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "./database/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $linea = json_decode($_POST['linea']);
    $id_unidad=$linea->ID_unidad;
    $id_unidad = htmlspecialchars($id_unidad, ENT_QUOTES, 'UTF-8');
    if(!filter_var($id_unidad, FILTER_VALIDATE_INT)){
        echo '<script>alert("Debes proporcionar una matricula valida"); window.location.href = "./comprar"; </script>';
        exit;
    }
    $id_linea=$linea->idLinea;
    $id_linea = htmlspecialchars($id_linea, ENT_QUOTES, 'UTF-8');
    if(!filter_var($id_linea, FILTER_VALIDATE_INT)){
        echo '<script>alert("Debes proporcionar una matricula valida"); window.location.href = "./comprar"; </script>';
        exit;
    }
    $asiento_selecionado = $_POST["asientoSeleccionado"];
    $asiento_selecionado = htmlspecialchars($asiento_selecionado, ENT_QUOTES, 'UTF-8');
    if(!filter_var($asiento_selecionado, FILTER_VALIDATE_INT)){
        echo '<script>alert("Debes proporcionar una matricula valida"); window.location.href = "./comprar"; </script>';
        exit;
    }
    $fechaViaje = $linea->fechaViaje;
    $fechaViaje = htmlspecialchars($fechaViaje, ENT_QUOTES, 'UTF-8');

    $query = "SELECT ID_horario FROM horario WHERE ID_linea=:id_linea AND ID_unidad=:id_unidad;";
    $sql = $conn->prepare($query);
    $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
    $sql->bindParam(":id_unidad", $id_unidad, PDO::PARAM_INT);
    $sql->execute();
    $horario = $sql->fetch(PDO::FETCH_ASSOC);
    $id_horario = $horario["ID_horario"];
    $id_horario = htmlspecialchars($id_horario, ENT_QUOTES, 'UTF-8');
    if(!filter_var($id_horario, FILTER_VALIDATE_INT)){
        echo '<script>alert("Debes proporcionar un horario valido"); window.location.href = "./comprar"; </script>';
        exit;
    }
   
    $query = "SELECT disponibilidad_asiento FROM horario_asiento WHERE Numero_asiento=:asiento_selecionado AND fecha_viaje =:fechaViaje AND ID_horario=:id_horario AND ID_linea=:id_linea AND ID_unidad=:id_unidad;";
    $sql = $conn->prepare($query);
    $sql->bindParam(":id_linea", $id_linea, PDO::PARAM_INT);
    $sql->bindParam(":asiento_selecionado", $asiento_selecionado, PDO::PARAM_INT);
    $sql->bindParam(":fechaViaje", $fechaViaje, PDO::PARAM_STR);
    $sql->bindParam(":id_unidad", $id_unidad, PDO::PARAM_INT);
    $sql->bindParam(":id_horario", $id_horario, PDO::PARAM_INT);
    $sql->execute();
    $asientos_ocupados = $sql->fetch(PDO::FETCH_ASSOC);
    
    if (empty($asientos_ocupados) || $asientos_ocupados["disponibilidad_asiento"] == 1) {
        $infolinea = array(
            'origen_tramo' => $linea->origen_tramo,
            'destino_tramo' => $linea->destino_tramo,
            'asientos_seleccionado' => $asiento_selecionado,
            'hora_salida' => $linea->hora_salida,
            'hora_llegada' => $linea->hora_llegada,
            'caracteristicas' => $linea->caracteristicas,
            'ID_unidad' => $linea->ID_unidad,
            'precio' => $linea->precio,
            'idLinea' => $linea->idLinea,
            'fechaViaje' => $linea->fechaViaje,
            "parada_origen" => $linea->parada_origen,
            "parada_destino" => $linea->parada_destino,

        );
        $_SESSION['infolinea'] = $infolinea;    
       
        header("location: ../page/confirmarViaje");

    } else {
        echo '<script>alert("El asiento seleccionado ya no esta disponible");</script>';
        echo '<script>window.location.href = "location: ./comprar";</script>';
    }

}
$conn = null;
?>