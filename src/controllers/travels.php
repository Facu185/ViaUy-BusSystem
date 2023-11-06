<?php
function findBus()
{
    require "./database/db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        try {

            if ($_POST["origen"] === "Origen" || $_POST["destino"] === "Destino") {
                throw new Exception("Debes proporcionar un origen y destino", 400);
            }

            $origen = $_POST["origen"];
            $destino = $_POST["destino"];

            $query = "SELECT numero_parada, localizacion FROM parada 
            WHERE localizacion=:origen OR localizacion=:destino;";
            $sql = $conn->prepare($query);
            $sql->bindParam(':origen', $origen);
            $sql->bindParam(':destino', $destino);
            $sql->execute();
            $data1 = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data1 as $parada) {
                if ($parada['localizacion'] == $origen) {

                    $numero_parada_1 = $parada['numero_parada'];
                } elseif ($parada['localizacion'] == $destino) {

                    $numero_parada_2 = $parada['numero_parada'];
                }
            }

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
            foreach ($data2 as $dato2) {
                if ($dato2['numero_parada_1'] == $numero_parada_1) {
                    $tramo_origen = $dato2['ID_tramo'];
                } elseif ($dato2['numero_parada_2'] == $numero_parada_2) {

                    $tramo_destino = $dato2['ID_tramo'];
                }
            }

            $datos = implode(",", $id_tramos);
            $query = "SELECT id_linea,id_tramo, orden_tramos FROM recorre WHERE id_tramo IN ($datos)";
            $sql = $conn->prepare($query);
            $sql->execute();
            $data3 = $sql->fetchAll(PDO::FETCH_ASSOC);


            foreach ($data3 as $dato3) {
                if ($dato3['id_tramo'] == $tramo_origen) {

                    $orden_tramoOrigen = $dato3['orden_tramos'];
                } elseif ($dato3['id_tramo'] == $tramo_destino) {

                    $orden_tramoDestino = $dato3['orden_tramos'];
                }
            }

            if (isset($orden_tramoOrigen) && isset($orden_tramoDestino) && $orden_tramoOrigen > $orden_tramoDestino) {
                return;
            }

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

                if (isset($filteredData[$id_linea])) {
                    // Verificamos si el id_tramo ya existe en los registros de esta línea
                    if (!in_array($id_tramo, $filteredData[$id_linea]['id_tramos'])) {
                        $filteredData[$id_linea]['id_tramos'][] = $id_tramo;
                    }
                } else {
                    // Si no tenemos registros para esta línea, simplemente agregamos el id_tramo
                    $filteredData[$id_linea] = [
                        'id_tramos' => [$id_tramo],
                        'id_linea' => $id_linea
                    ];
                }
            }


            $lineas_utiles = array();

            foreach ($filteredData as $id_linea => $tramosData) {
                foreach ($tramosData['id_tramos'] as $id_tramo) {
                    if (in_array($id_tramo, $tramosUnicos)) {
                        // Si el id_tramo coincide con los valores en el otro array
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



            $id_tramo = [];

            foreach ($filteredData as $datosLinea) {
                $id_tramo = array_merge($id_tramo, $datosLinea['id_tramos']);
            }
            $tramo = implode(",", $id_tramo);
            $linea = implode(",", $lineas_utiles);

            $fecha = $_POST["date"];
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

            $nombreDiaEnIngles = $fechaObj->format('l');

            $nombreDiaEnEspanol = $diasEnIngles[$nombreDiaEnIngles];


            $query = "SELECT r.id_linea, r.origen_tramo, r.destino_tramo, r.ID_tramo, r.orden_tramos, d.dia,d.habilitacion 
                  FROM recorre r 
                  JOIN dia d 
                  WHERE (r.ID_tramo IN ($tramo) AND d.dia=:nombreDiaEnEspanol AND d.habilitacion=1  AND r.ID_linea IN ($linea))";
            $sql = $conn->prepare($query);
            $sql->bindParam(':nombreDiaEnEspanol', $nombreDiaEnEspanol);
            $sql->execute();
            $data4 = $sql->fetchAll(PDO::FETCH_ASSOC);


            $orden_tramos_por_linea = [];

            foreach ($data4 as $row) {
                $id_linea = $row["id_linea"];
                $orden_tramos = $row["orden_tramos"];

                if (!isset($orden_tramos_por_linea[$id_linea])) {
                    $orden_tramos_por_linea[$id_linea] = [];
                }

                $orden_tramos_por_linea[$id_linea][] = $orden_tramos;
            }

            $id_linea_array = [];

            foreach ($data4 as $row) {
                if (isset($row["id_linea"])) {
                    $id_linea_array[] = $row["id_linea"];
                }
            }

            $id_linea_array = array_unique($id_linea_array);
            $linea_id = implode(",", $id_linea_array);
            $id_unidad = [];

            $info_lineas = array();
            foreach ($orden_tramos_por_linea as $clave => $valor) {
                $info_linea[$clave] = array();
                foreach ($valor as $elemento) {
                    $resultado = array();

                    if (isset($orden_tramos_por_linea[$clave])) {
                        $resultado = $orden_tramos_por_linea[$clave];
                    }
                }
                $orden_tramo_min = min($resultado);
                $orden_tramo_max = max($resultado);

                $query = "SELECT ID_tramo, orden_tramos,id_linea FROM recorre 
                    WHERE (orden_tramos BETWEEN :orden_tramo_min AND :orden_tramo_max) AND ID_linea = :clave";
                $sql = $conn->prepare($query);
                $sql->bindParam(':orden_tramo_min', $orden_tramo_min, PDO::PARAM_INT);
                $sql->bindParam(':orden_tramo_max', $orden_tramo_max, PDO::PARAM_INT);
                $sql->bindParam(':clave', $clave, PDO::PARAM_INT);
                $sql->execute();
                $data5 = $sql->fetchAll(PDO::FETCH_ASSOC);

                $lineas_id_array = array();
                foreach ($data5 as $item) {
                    $lineas_id_array[] = $item["id_linea"];
                }

                $lineas_id_array = array_unique($lineas_id_array);

                $ulinea = implode(",", $lineas_id_array);

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

                if (empty($horarios)) {
                    return;
                }

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


                $tipo_tramo = [];

                foreach ($data7 as $row) {
                    if (isset($row["tipo_tramo"])) {
                        $tipo_tramo[] = $row["tipo_tramo"];
                    }
                }

                $tipo_tramo = array_unique($tipo_tramo);

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
                            $id_unidad[] = $valor;
                        }

                        $asientos_unidades = array();
                        foreach ($id_unidad as $unidad) {
                            $info_linea[$clave]['unidad'] = $unidad;

                            $query = "SELECT *
                             FROM asiento 
                             WHERE id_unidad in ($unidad)";
                            $sql = $conn->prepare($query);
                            $sql->execute();
                            $info_asientos = $sql->fetchAll(PDO::FETCH_ASSOC);


                            $id_horario = $row["ID_horario"];
                            $query = "SELECT id_unidad, numero_asiento, disponibilidad_asiento 
                            FROM horario_asiento 
                            WHERE id_unidad in (:unidad) AND ID_horario IN (:id_horario) 
                            AND fecha_viaje IN (:fecha) 
                            AND disponibilidad_asiento IN (0);";
                            $sql = $conn->prepare($query);
                            $sql->bindParam(':id_horario', $id_horario);
                            $sql->bindParam(':unidad', $unidad);
                            $sql->bindParam(':fecha', $fecha);
                            $sql->execute();
                            $info_asientos_establece = $sql->fetchAll(PDO::FETCH_ASSOC);


                            $asientos_disponibles = 0;
                            $asientos_ocupados = array();
                            foreach ($info_asientos as $info_asiento) {
                                $asientos_disponibles++;
                                foreach ($info_asientos_establece as $establece) {
                                    if ($info_asiento['Numero_asiento'] == $establece['numero_asiento'] && $establece['disponibilidad_asiento'] == 0) {
                                        $asientos_disponibles--;
                                        array_push($asientos_ocupados, $info_asiento['Numero_asiento']);
                                    }
                                }
                            }



                            $new_info_asientos = $info_asientos;
                            $count = count($new_info_asientos);
                            for ($i = 0; $i < $count; $i++) {
                                if (in_array($new_info_asientos[$i]['Numero_asiento'], $asientos_ocupados)) {
                                    $new_info_asientos[$i]['disponibilidad'] = 0;
                                } else {
                                    $new_info_asientos[$i]['disponibilidad'] = 1;
                                }
                            }

                            $info_linea[$clave][$row['ID_unidad']]['asientos_libres'] = $asientos_disponibles;
                            $info_linea[$clave][$row['ID_unidad']]['info_asientos'] = $new_info_asientos;


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

                $precioKm = [];

                foreach ($precios_por_kilometro as $indice => $valor) {
                    if (isset($valor['Par_int']) && !empty($valor['Par_int'])) {
                        $precioKm[$indice] = $valor['Par_int'];
                    }
                }


                foreach ($precios_por_kilometro as $precio) {
                    $nuevo_elemento = ['precio' => $precio["Par_int"], 'id' => $precio["nombre"]];
                    $precioKm[$precio['nombre']] = $nuevo_elemento;

                }

                $precio_total = 0;

                foreach ($sumas_por_tipo as $rutaID => $distancia) {
                    // Verifica si el ID de la ruta existe en el arreglo de valores
                    if (isset($precioKm[$rutaID])) {
                        $valorRuta = $precioKm[$rutaID]['precio'];
                        $precio_total += ($valorRuta * $distancia);
                    }
                }
                $info_linea['origen_tramo'] = $origen;
                $info_linea['destino_tramo'] = $destino;
                $info_linea[$clave]['precio_total'] = $precio_total;
                $info_lineas[] = $info_linea;
                $info_linea[$clave]["fecha_viaje"] = $fecha;
                $info_linea[$clave]["parada_origen"] = $numero_parada_1;
                $info_linea[$clave]["parada_destino"] = $numero_parada_2;
                $info_linea[$clave]["id_linea"] = $clave;

            }
            $precio_total = 0;
            return $info_linea;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

$info_linea = findBus();
if (empty($info_linea)) {
    echo '<script>alert("No existe una línea para ese recorrido.");</script>';
    echo '<script>window.location.href = "../page/home";</script>';
    exit;
}
?>