<?php

function findBus()
{
    require "./database/db.php";
    /*$query = "SELECT origen_linea,destino_linea FROM linea";
    $sql = $conn->prepare($query);
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_ASSOC);
    ($data);*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        try {
            /*  if (empty($_POST["origen"])||empty($_POST["destino"])){
                 throw new Exception("Debes proporcionar un origen y destino",400);
             } */
            $origen = $_POST["origen"];

            $destino = $_POST["destino"];

            /* ($origen . $destino); */
            $query = "SELECT numero_parada FROM parada WHERE localizacion=:origen OR localizacion=:destino";
            $sql = $conn->prepare($query);
            $sql->bindParam(':origen', $origen);
            $sql->bindParam(':destino', $destino);
            $sql->execute();
            $data1 = $sql->fetchAll(PDO::FETCH_ASSOC);
            $numero_parada_1 = $data1[0]["numero_parada"];
            $numero_parada_2 = $data1[1]["numero_parada"];
            /* ($numero_parada_1 . $numero_parada_2); */

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
            /* ($id_tramos); */
            $datos = implode(",", $id_tramos);
            /* ($datos); */
            $query = "SELECT id_linea,id_tramo FROM recorre WHERE id_tramo IN ($datos)";
            $sql = $conn->prepare($query);
            $sql->execute();
            $data3 = $sql->fetchAll(PDO::FETCH_ASSOC);
            /* ($data3); */


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


            /* ($lineas_utiles); */

            $id_tramo = [];

            foreach ($filteredData as $datosLinea) {
                $id_tramo = array_merge($id_tramo, $datosLinea['id_tramos']);
            }
            $tramo = implode(",", $id_tramo);
            /*   ($tramo); */


            $linea = implode(",", $lineas_utiles);
            /*  ($linea); */

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

            /*  ($nombreDiaEnEspanol); */

            $query = "SELECT r.id_linea, r.origen_tramo, r.destino_tramo, r.ID_tramo, r.orden_tramos, d.dia,d.habilitacion 
                  FROM recorre r 
                  JOIN dia d 
                  WHERE (r.ID_tramo IN ($tramo) AND d.dia=:nombreDiaEnEspanol AND d.habilitacion=1  AND r.ID_linea IN ($linea))";
            $sql = $conn->prepare($query);
            $sql->bindParam(':nombreDiaEnEspanol', $nombreDiaEnEspanol);
            $sql->execute();
            $data4 = $sql->fetchAll(PDO::FETCH_ASSOC);
            /* ($data4); */

            $orden_tramos_array = []; // Inicializamos un arreglo vacío

            $orden_tramos_por_linea = [];

            foreach ($data4 as $row) {
                $id_linea = $row["id_linea"];
                $orden_tramos = $row["orden_tramos"];

                // Verificamos si el id_linea ya existe en el arreglo, si no existe, lo inicializamos como un arreglo vacío
                if (!isset($orden_tramos_por_linea[$id_linea])) {
                    $orden_tramos_por_linea[$id_linea] = [];
                }

                // Agregamos el valor de "orden_tramos" al arreglo correspondiente
                $orden_tramos_por_linea[$id_linea][] = $orden_tramos;
                /* ($id_linea); */
            }
            // El resultado final será un arreglo donde cada clave es el id_linea y el valor es un arreglo de orden_tramos
            /*  ($orden_tramos_por_linea); */

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
            /*  ($id_linea_array); */
            $linea_id = implode(",", $id_linea_array);

            // $id_linea_array ahora contiene valores únicos
            /* ($id_linea_array); */
            $id_unidad = [];

            $info_lineas = array();
            foreach ($orden_tramos_por_linea as $clave => $valor) {
                $info_linea[$clave] = array();
                foreach ($valor as $elemento) {
                    $resultado = array(); // Este arreglo contendrá los valores filtrados

                    if (isset($orden_tramos_por_linea[$clave])) {
                        $resultado = $orden_tramos_por_linea[$clave];
                    }
                }
                /* ($resultado); */
                $orden_tramo_min = min($resultado);
                $orden_tramo_max = max($resultado);
                /* ("a" . $orden_tramo_min);
                 ("b" . $orden_tramo_max); */
                $query = "SELECT ID_tramo, orden_tramos,id_linea FROM recorre 
                    WHERE (orden_tramos BETWEEN :orden_tramo_min AND :orden_tramo_max) AND ID_linea = :clave";
                $sql = $conn->prepare($query);
                $sql->bindParam(':orden_tramo_min', $orden_tramo_min, PDO::PARAM_INT);
                $sql->bindParam(':orden_tramo_max', $orden_tramo_max, PDO::PARAM_INT);
                $sql->bindParam(':clave', $clave, PDO::PARAM_INT);
                $sql->execute();
                $data5 = $sql->fetchAll(PDO::FETCH_ASSOC);



                $lineas_id_array = array(); // Inicializa un arreglo vacío

                foreach ($data5 as $item) {
                    $lineas_id_array[] = $item["id_linea"];
                }

                // Elimina elementos duplicados
                $lineas_id_array = array_unique($lineas_id_array);

                /* ($lineas_id_array); */
                $ulinea = implode(",", $lineas_id_array);
                /* foreach ($lineas_id_array as $ulines) {
                     ($ulines);
                } */

                $query = "SELECT * FROM linea   WHERE id_linea =:ulinea";
                $sql = $conn->prepare($query);
                $sql->bindParam(':ulinea', $ulinea);
                $sql->execute();
                $data6 = $sql->fetchAll(PDO::FETCH_ASSOC);
                $info_linea[$clave]['nombre_linea'] = $data6[0]['nombre_linea'];

                $query = "SELECT * FROM horario WHERE id_linea =:ulinea";
                $sql = $conn->prepare($query);
                $sql->bindParam(':ulinea', $ulinea);
                $sql->execute();
                $horarios = $sql->fetchAll(PDO::FETCH_ASSOC);
                //$info_linea[$clave]['hora_salida'] = $horarios[0]['hora_salida'];
                //$info_linea[$clave]['hora_llegada'] = $horarios[0]['hora_llegada'];
                $tramos_id = [];

                foreach ($data5 as $row) {
                    if (isset($row["ID_tramo"])) {
                        $tramos_id[] = $row["ID_tramo"];
                    }
                }

                $tramo_id = implode(",", $tramos_id);

                $query = "SELECT tipo_tramo, distancia FROM tramo WHERE ID_tramo in ($tramo_id)";
                $sql = $conn->prepare($query);
                $sql->execute();
                $data7 = $sql->fetchAll(PDO::FETCH_ASSOC);

                /* ($data7); */

                $tipo_tramo = [];

                foreach ($data7 as $row) {
                    if (isset($row["tipo_tramo"])) {
                        $tipo_tramo[] = $row["tipo_tramo"];
                    }
                }

                // Eliminamos valores duplicados utilizando array_unique
                $tipo_tramo = array_unique($tipo_tramo);

                // Convertimos $tipo_tramo en una cadena con implode
                $tipo_tramos = implode(",", $tipo_tramo);

                $query = "SELECT ID_parametro, nombre, Par_int FROM parametro where nombre IN ($tipo_tramos)";
                $sql = $conn->prepare($query);
                $sql->execute();
                $precios_por_kilometro = $sql->fetchAll(PDO::FETCH_ASSOC);

                $lineas_unidad = array();
                foreach ($horarios as $row) {
                    $lineas_unidad[] = $row["ID_unidad"];

                    if (isset($row["ID_unidad"])) {
                        $valor = $row["ID_unidad"];
                        if (!in_array($valor, $id_unidad)) {
                            // Si el valor no existe en $id_unidad, lo agregamos.
                            $id_unidad[] = $valor;
                        }

                        $asientos_unidades = array();
                        foreach ($id_unidad as $unidad) {
                            $info_linea[$clave]['unidad'] = $unidad;
                            /*  ($info_linea); */

                            $query = "SELECT *
                             FROM asiento 
                             WHERE id_unidad in ($unidad)";
                            $sql = $conn->prepare($query);
                            $sql->execute();
                            $info_asientos = $sql->fetchAll(PDO::FETCH_ASSOC);
                            $asientos_disponibles = 0;
                            foreach ($info_asientos as $info_asiento) {
                                if ($info_asiento['disponibilidad'] === 1) {
                                    $asientos_disponibles++;
                                }
                            }
                            $info_linea[$clave][$row['ID_unidad']]['asientos_libres'] = $asientos_disponibles;


                            $query = "SELECT *
                            FROM caracteristicas
                            WHERE id_unidad in ($unidad)";
                            $sql = $conn->prepare($query);
                            $sql->execute();
                            $caracteristicas_unidad = $sql->fetchAll(PDO::FETCH_ASSOC);
                        }

                    }

                    $info_linea[$clave][$row['ID_unidad']]['hora_salida'] = $row['hora_salida'];
                    $info_linea[$clave][$row['ID_unidad']]['hora_llegada'] = $row['hora_llegada'];
                    $info_linea[$clave][$row['ID_unidad']]['caracteristicas'] = $caracteristicas_unidad[0]['tipo'];
                }


                $sumas_por_tipo = [];
                foreach ($data7 as $dato) {
                    $tipo_tramo = $dato['tipo_tramo'];
                    $distancia = $dato['distancia'];
                    if (!isset($sumas_por_tipo[$tipo_tramo])) {
                        $sumas_por_tipo[$tipo_tramo] = 0;
                    }
                    $sumas_por_tipo[$tipo_tramo] += $distancia;
                }

                $precio_km = [1 => $precios_por_kilometro[0]['Par_int'], 2 => $precios_por_kilometro[1]['Par_int'], 3 => $precios_por_kilometro[2]['Par_int']];

                foreach ($precios_por_kilometro as $precio) {
                    $nuevo_elemento = ['precio' => $precio["Par_int"], 'id' => $precio["nombre"]];
                    $precio_km[$precio['nombre']] = $nuevo_elemento;

                }
                $precio_total = 0;

                foreach ($sumas_por_tipo as $rutaID => $distancia) {
                    // Verifica si el ID de la ruta existe en el arreglo de valores
                    if (isset($precio_km[$rutaID])) {
                        $valorRuta = $precio_km[$rutaID]['precio'];
                        $precio_total += ($valorRuta * $distancia);
                    }
                }
                $info_linea['origen_tramo'] = $origen;
                $info_linea['destino_tramo'] = $destino;
                $info_linea[$clave]['precio_total'] = $precio_total;
                $info_lineas[] = $info_linea;
            }
            $precio_total = 0;
            return $info_linea;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
$info_linea = findBus();

?>