<?php
require "../database/db.php";
$query = "SELECT ID_unidad FROM unidad;";
$stmt = $conn->prepare($query);
$stmt->execute();

// Obtener resultados y almacenar en $opciones
$resultados = array(); // Crear un array para almacenar los resultados

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resultados[] = $row; // Agregar cada fila al array de resultados
}

echo json_encode($resultados);
?>