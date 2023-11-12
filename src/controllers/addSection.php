<?php
require "./database/db.php";

try {
    if (!empty($_POST["addSection"])) {
        $contador = 0;
        $contador2 = 0;

        if ($contador2 == 0) {
            $contador2 = '';
        }

        $arr = array($_POST);
        $arr_forms = array_slice($arr[0], 0);
        $rep = (count($arr_forms) - 1) / 7;

        for ($a = 0; $a <= $rep; $a++) {
            $length = $contador + 6;

            for ($i = $contador; $i <= $length; $i++) {
                $parada_origen = $arr_forms["numeroParadaOrigen" . $contador2];
                $parada_destino = $arr_forms["numeroParadaDestino" . $contador2];
                $tipo_tramo = $arr_forms["tipoTramo" . $contador2];
                $distancia = $arr_forms["distancia" . $contador2];
                $tiempo_viaje = $arr_forms["tiempoViaje" . $contador2];
                $calles = $arr_forms["calles" . $contador2];
                $rutas = $arr_forms["rutas" . $contador2];
             print_r($parada_origen);   
                $contador++;
            }
            if(empty($parada_origen) || empty($parada_destino) || empty($tipo_tramo) || empty($distancia) || empty($tiempo_viaje) || empty($calles) || empty($rutas) || !is_numeric($parada_origen) || !is_numeric($parada_destino) || !is_numeric($tipo_tramo)) {
                echo '<script>alert("Faltan completar datos"); window.location.href = "./addBusSection"; </script>';
            }
            $contador2++;

            $query = "SELECT numero_parada_1, numero_parada_2 FROM tramo WHERE numero_parada_1 = :parada_origen AND numero_parada_2 = :parada_destino";
            $sql = $conn->prepare($query);
            $sql->bindParam(":parada_origen", $parada_origen);
            $sql->bindParam(":parada_destino", $parada_destino);
            $sql->execute();
            $paradas = $sql->fetch(PDO::FETCH_ASSOC);
            if (!empty($paradas)) {
                echo '<script>alert("Este tramo ya existe"); window.location.href = "./addBusSection"; </script>';
            }

            $query = "INSERT INTO tramo (numero_parada_1, numero_parada_2, tipo_tramo, distancia, calles, rutas, tiempo) VALUES (:parada_origen, :parada_destino, :tipo_tramo, :distancia, :calles, :rutas, :tiempo_viaje)";
            $sql = $conn->prepare($query);
            $sql->bindParam(":parada_origen", $parada_origen);
            $sql->bindParam(":parada_destino", $parada_destino);
            $sql->bindParam(":tipo_tramo", $tipo_tramo);
            $sql->bindParam(":distancia", $distancia);
            $sql->bindParam(":calles", $calles);
            $sql->bindParam(":rutas", $rutas);
            $sql->bindParam(":tiempo_viaje", $tiempo_viaje);
            $sql->execute();

            echo '<script>alert("Tramo añadido con exito"); window.location.href = "./addBusSection"; </script>';
        }
    }

} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>