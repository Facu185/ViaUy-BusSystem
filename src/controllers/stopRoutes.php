<?php 
require "../database/db.php";
$query = "SELECT ID_tramo, Numero_parada_1, Numero_parada_2 FROM tramo;";
$stmt = $conn->prepare($query);
$stmt->execute();

$resultados = array(); // Crear un array para almacenar los resultados

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $resultados[] = $row; // Agregar cada fila al array de resultados
}

echo json_encode($resultados);
?>