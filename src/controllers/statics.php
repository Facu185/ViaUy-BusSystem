<?php
require "./database/db.php";

/* try {
    if (!empty($_POST["showstatics"])) {
        $f_date = $_POST["fDate"];
        $s_date = $_POST["sDate"];
        
        $query = "SELECT 
            DATE_FORMAT(fecha_viaje, '%Y-%m') AS Mes,
            SUM(precio) AS SumaPrecios,
            COUNT(*) AS Compras
        FROM Pasaje
        WHERE estado IN ('Reservado-Comprado', 'Comprado')
          AND fecha_viaje BETWEEN :f_date AND :s_date  
        GROUP BY Mes;
        ";
        $sql = $conn->prepare($query);
        $sql->bindParam(":f_date", $f_date);
        $sql->bindParam(":s_date", $s_date);
        $sql->execute();
        $statics = $sql->fetchAll(PDO::FETCH_ASSOC);

        $datos = array(1, 2, 3, 4);


        echo json_encode($datos);   
        header("location: ./dashboard");
        
    }


} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
} */
$datos = array(1, 2, 3, 4);

header('Content-Type: application/json');
        echo json_encode($datos);
?>