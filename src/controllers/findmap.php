<?php
require("../database/db.php");

$query = 'SELECT Localizacion,latitud, longitud FROM parada';
$sql = $conn->prepare($query);
$sql->execute();

$puntos = array();

while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    $puntos[] = $row;
}

header('Content-Type: application/json');
echo json_encode($puntos);

?>