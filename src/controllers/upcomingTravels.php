<?php
require "./database/db.php";
try {
    date_default_timezone_set('America/Montevideo');
    $hora_actual = date('H:i:s');
    $diaSemana = date('l');
    $diasEnIngles = array(
        'Monday' => 'Lunes',
        'Tuesday' => 'Martes',
        'Wednesday' => 'Miércoles',
        'Thursday' => 'Jueves',
        'Friday' => 'Viernes',
        'Saturday' => 'Sábado',
        'Sunday' => 'Domingo'
    );
    $diaActual = $diasEnIngles[$diaSemana];
    $query = "SELECT *
    FROM horario
    WHERE hora_salida >= ADDTIME(:hora_actual, '00:05:00')
    ORDER BY ABS(TIMEDIFF(hora_salida, :hora_actual))
    LIMIT 2;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':hora_actual', $hora_actual, PDO::PARAM_STR);
    $sql->execute();
    $horarios = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($horarios as $horario) {
        $id_unidad = $horario['ID_unidad'];
        $id_linea = $horario['ID_linea'];
        $hora_salida = $horario['hora_salida'];
        $hora_llegada = $horario['hora_llegada'];
      
        $query = "SELECT tipo FROM caracteristicas WHERE ID_unidad=:id_unidad";
        $sql = $conn->prepare($query);
        $sql->bindParam(':id_unidad', $id_unidad, PDO::PARAM_INT);
        $sql->execute();
        $caracteristicas = $sql->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT nombre_linea, origen_linea, destino_linea FROM linea WHERE ID_linea=:id_linea";
        $sql = $conn->prepare($query);
        $sql->bindParam(':id_linea', $id_linea, PDO::PARAM_INT);
        $sql->execute();
        $lineas = $sql->fetchAll(PDO::FETCH_ASSOC);

        $proximasSalidas[] = array(
            'nombre_linea' => $lineas[0]["nombre_linea"],
            'caracteristicas' => $caracteristicas[0]["tipo"],
            'origen_linea' => $lineas[0]["origen_linea"],
            'destino_linea' => $lineas[0]["destino_linea"],
            'hora_salida' => $hora_salida,
            'hora_llegada' => $hora_llegada,
            "diaActual" => $diaActual,
        );
        $_SESSION['proximasSalidas'] = $proximasSalidas; 
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
$conn = null;
?>