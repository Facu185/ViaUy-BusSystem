<?php
require "../database/db.php";
/*$query = "SELECT origen_linea,destino_linea FROM linea";
$sql = $conn->prepare($query);
$sql->execute();
$data = $sql->fetch(PDO::FETCH_ASSOC);
print_r($data);*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $origen = $_POST["origen"];
        $destino = $_POST["destino"];
        //print_r($origen . $destino);
        $query = "SELECT numero_parada FROM parada WHERE localizacion=:origen OR localizacion=:destino";
        $sql = $conn->prepare($query);
        $sql->bindParam(':origen', $origen);
        $sql->bindParam(':destino', $destino);
        $sql->execute();
        $data1 = $sql->fetchAll(PDO::FETCH_ASSOC);
        $numero_parada_1 = $data1[0]["numero_parada"];
        $numero_parada_2 = $data1[1]["numero_parada"];
        //print_r($numero_parada_2);
        $query = "SELECT ID_tramo,numero_parada_1,numero_parada_2 FROM tramo WHERE numero_parada_1=:numero_parada_1 OR numero_parada_2=:numero_parada_2";
        $sql = $conn->prepare($query);
        $sql->bindParam(':numero_parada_1', $numero_parada_1);
        $sql->bindParam(':numero_parada_2', $numero_parada_2);
        $sql->execute();
        $data2 = $sql->fetchAll(PDO::FETCH_ASSOC);
        $id_tramos = [];
        foreach ($data2 as $tramos) {
            $id_tramos[] = $tramos["ID_tramo"];
        }
        /* print_r($id_tramos); */
        $datos = implode(",", $id_tramos);
        $query = "SELECT id_linea,id_tramo FROM recorre WHERE id_tramo IN ($datos)";
        $sql = $conn->prepare($query);
        $sql->execute();
        $data3 = $sql->fetchAll(PDO::FETCH_ASSOC);
        /*   print_r($data3); */


        foreach ($data2 as $vrtramo) {
            $nuevo_arreglo[] = [
                "ID_tramo" => $vrtramo["ID_tramo"],
                "numero_parada_1" => $vrtramo["numero_parada_1"],
                "numero_parada_2" => $vrtramo["numero_parada_2"]
            ];
        }

        $tramosUnicos = array();

        foreach ($nuevo_arreglo as $vrtramo) {
            if ($vrtramo["numero_parada_1"] == $numero_parada_1 && $vrtramo["numero_parada_2"] == $numero_parada_2) {
                array_push($tramosUnicos, $vrtramo["ID_tramo"]);
            }
        }
        $filteredData = [];

        foreach ($data3 as $row) {
            $id_linea = $row['id_linea'];
            $id_tramo = $row['id_tramo'];

            // Si ya tenemos registros para esta línea
            if (isset($filteredData[$id_linea])) {
                // Verificamos si el id_tramo ya existe en los registros de esta línea
                if (!in_array($id_tramo, $filteredData[$id_linea]['id_tramos'])) {
                    $filteredData[$id_linea]['id_tramos'][] = $id_tramo;
                }
            } else {
                // Si no tenemos registros para esta línea, simplemente agregamos el id_tramo
                $filteredData[$id_linea] = [
                    'id_tramos' => [$id_tramo],
                    'id_linea' => $id_linea // Incluir el id_linea
                ];
            }
        }


        $lineas_utiles = array();

        foreach ($filteredData as $id_linea => $tramosData) {
            foreach ($tramosData['id_tramos'] as $id_tramo) {
                if (in_array($id_tramo, $tramosUnicos)) {
                    // El id_tramo coincide con los valores en el otro array
                    array_push($lineas_utiles, $id_linea);
                }
            }
        }
        foreach ($filteredData as $key => $value) {
            if (!in_array($value['id_tramos'], $lineas_utiles)) {
                // Si no existe, agregarlo al array
                if (count($value['id_tramos']) > 1) {
                    array_push($lineas_utiles, $value['id_linea']);
                }
            }
        }


        /* print_r($lineas_utiles); */

        $id_tramo = [];

        foreach ($filteredData as $datosLinea) {
            $id_tramo = array_merge($id_tramo, $datosLinea['id_tramos']);
        }
        $tramo = implode(",", $id_tramo);
        /*   print_r($tramo); */


        $linea = implode(",", $lineas_utiles);
        /*  print_r($linea); */

        $fecha = $_POST["date"];

        // Obtén el valor del input de tipo fecha
        $fecha = $_POST['date'];

        // Convierte la fecha en un objeto DateTime
        $fechaObj = new DateTime($fecha);

        // Array asociativo con las traducciones de los días de la semana
        $diasEnIngles = array(
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miércoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sábado',
            'Sunday' => 'Domingo'
        );

        // Obtén el nombre del día de la semana en inglés
        $nombreDiaEnIngles = $fechaObj->format('l');

        // Traduce el nombre del día al español
        $nombreDiaEnEspanol = $diasEnIngles[$nombreDiaEnIngles];

        /*  print_r($nombreDiaEnEspanol); */

        $query = "SELECT r.id_linea, r.origen_tramo, r.destino_tramo, r.ID_tramo, r.orden_tramos, d.dia,d.habilitacion 
                  FROM recorre r 
                  JOIN dia d 
                  WHERE (r.ID_tramo IN ($tramo) AND d.dia=:nombreDiaEnEspanol AND d.habilitacion=1  AND r.ID_linea IN ($linea))";
        $sql = $conn->prepare($query);
        $sql->bindParam(':nombreDiaEnEspanol', $nombreDiaEnEspanol);
        $sql->execute();
        $data4 = $sql->fetchAll(PDO::FETCH_ASSOC);
        /*  print_r($data4); */

        $orden_tramos_array = []; // Inicializamos un arreglo vacío

        foreach ($data4 as $row) {
            // Verificamos si existe la clave "orden_tramos" en la fila actual
            if (isset($row["orden_tramos"])) {
                // Agregamos el valor de "orden_tramos" al arreglo
                $orden_tramos_array[] = $row["orden_tramos"];
            }
        }

        $id_linea_array = []; // LINEAS UTILES DESPUES DE TODOS LOS FILTROS

        foreach ($data4 as $row) {
            // Verificamos si existe la clave "id_linea" en la fila actual
            if (isset($row["id_linea"])) {
                // Agregamos el valor de "id_linea" al arreglo
                $id_linea_array[] = $row["id_linea"];
            }
        }

        // Eliminamos los valores duplicados de $id_linea_array
        $id_linea_array = array_unique($id_linea_array);

        // $id_linea_array ahora contiene valores únicos
         print_r($id_linea_array);

        $orden_tramo_min = min($orden_tramos_array);
        $orden_tramo_max = max($orden_tramos_array);
        /*  print_r("a" . $orden_tramo_min);
         print_r("b" . $orden_tramo_max); */

        foreach ($id_linea_array as $rows) {
            $query = "SELECT ID_tramo, orden_tramos,id_linea FROM recorre WHERE (orden_tramos BETWEEN :orden_tramo_min AND :orden_tramo_max) AND ID_linea = :rows";
            $sql = $conn->prepare($query);
            $sql->bindParam(':orden_tramo_min', $orden_tramo_min, PDO::PARAM_INT);
            $sql->bindParam(':orden_tramo_max', $orden_tramo_max, PDO::PARAM_INT);
            $sql->bindParam(':rows', $rows, PDO::PARAM_INT);
            $sql->execute();
            $data5 = $sql->fetchAll(PDO::FETCH_ASSOC);
            /* print_r($data5); */
        }
        $lineas_id = $data5[0]["id_linea"];
        /* print_r($lineas_id); */
        $query = "SELECT l.*, h.* FROM linea l JOIN horario h ON l.id_linea = h.id_linea WHERE l.id_linea =:lineas_id";
        $sql = $conn->prepare($query);
        $sql->bindParam(':lineas_id', $lineas_id);
        $sql->execute();
        $data6 = $sql->fetchAll(PDO::FETCH_ASSOC);
       /*  print_r($data6); */

        $tramos_id = []; // Inicializamos un array vacío para almacenar los valores ID_tramo

        foreach ($data5 as $row) {
            if (isset($row["ID_tramo"])) {
                $tramos_id[] = $row["ID_tramo"]; // Agregamos cada valor ID_tramo al array
            }
        }

        // Ahora $tramos_id contiene todos los valores ID_tramo de $data5
        /* print_r($tramos_id); */

        $tramo_id = implode(",", $tramos_id);

        $query = "SELECT tipo_tramo, distancia FROM tramo WHERE ID_tramo in ($tramo_id)";
        $sql = $conn->prepare($query);
        $sql->execute();
        $data7 = $sql->fetchAll(PDO::FETCH_ASSOC);
        /* print_r($data7); */

        $tipo_tramo = []; // Inicializamos un array vacío para almacenar los valores tipo_tramo

        foreach ($data7 as $row) {
            if (isset($row["tipo_tramo"])) {
                $tipo_tramo[] = $row["tipo_tramo"]; // Agregamos cada valor tipo_tramo al array
            }
        }

        // Eliminamos valores duplicados utilizando array_unique
        $tipo_tramo = array_unique($tipo_tramo);

        // Ahora $tipo_tramo contiene valores tipo_tramo únicos
        /* print_r($tipo_tramo); */

        // Convertimos $tipo_tramo en una cadena con implode
        $tipo_tramos = implode(",", $tipo_tramo);
        /*  print_r($tipo_tramos); */


        $query = "SELECT ID_parametro, nombre, Par_int FROM parametro where nombre IN ($tipo_tramos)";
        $sql = $conn->prepare($query);
        $sql->execute();
        $data8 = $sql->fetchAll(PDO::FETCH_ASSOC);
        /*  print_r($data8); */

        $id_unidad = []; // Inicializamos un array vacío para almacenar los valores ID_unidad

        foreach ($data6 as $row) {
            if (isset($row["ID_unidad"])) {
                $id_unidad[] = $row["ID_unidad"]; // Agregamos cada valor ID_unidad al array
            }
        }

        // Ahora $id_unidad contiene todos los valores ID_unidad de $data6
       /*  print_r($id_unidad); */
        $id_unidades = implode(",", $id_unidad);
        $query = "SELECT a.*, c.*
        FROM asiento a
        JOIN caracteristicas c 
        ON a.id_unidad = c.id_unidad 
        WHERE a.id_unidad =:id_unidades";
        $sql = $conn->prepare($query);
        $sql->bindParam(':id_unidades', $id_unidades);
        $sql->execute();
        $data8 = $sql->fetchAll(PDO::FETCH_ASSOC);
        /* print_r($data8); */

        


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>