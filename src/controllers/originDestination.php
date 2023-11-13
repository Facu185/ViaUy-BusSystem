<?php
require "../database/db.php";
try {
    $query = "SELECT Localizacion FROM parada
ORDER BY Localizacion ASC;";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $opciones = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $opciones[] = $row["Localizacion"];
    }
    echo json_encode($opciones);

} catch (Exception $e) {
    echo $e->getMessage();
}
$conn = null;
?>