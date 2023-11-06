<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Modificar unidad</p>
    <form method="post" action="./updateBus">
        <input type="text" name="matricula" placeholder="matricula unidad">
        <input type="text" name="nuevaMatricula" placeholder="Nueva matricula unidad">
        <input type="text" name="cantAsientos" placeholder="cantidad de asientos">
        <input type="text" name="tipoAsientos" placeholder="tipo de asientos">
        <input type="text" name="caracteristicas" placeholder="caracteristicas">
        <input class="button--primary" type="submit" name="updateBus">
    </form>
    <!--     <p>Modificar Parada</p>
    <form method="post" action="./updateBusStop">
        <select name="numeroParadaOrigen" id="numeroParadaOrigen">
            <option value="Parada de origen del tramo" selected>Parada de origen del tramo</option>
        </select>
        <select name="numeroParadaDestino" id="numeroParadaDestino" style="display: none;">
            <option value="Parada de destino del tramo" selected>Parada de destino del tramo</option>
        </select>
        <input type="text" name="localizacion" placeholder="localizacion">
        <input type="text" name="latitud" placeholder="latitud">
        <input type="text" name="longitud" placeholder="longitud">
        <input type="submit" name="modifyBusStop">
    </form> -->
<!--     <p>Modificar tramo</p>
    <form id="formulario" method="post" action="./modifySection">
        <select name="numeroParadaOrigen" id="numeroParadaOrigenTramo">
            <option value="Seleccione tramo 1" selected>Seleccione la primera parada del recorrido</option>
        </select>
        <select name="tipoTramo">
            <option value="Tipo de tramo" selected>Tipo de tramo</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <input type="number" name="distancia" placeholder="Distancia">
        <input type="number" name="tiempoViaje" placeholder="tiempo de viaje">
        <input type="text" name="calles" placeholder="Calles">
        <input type="text" name="rutas" placeholder="Rutas">
        <input type="submit" name="modifySection">
    </form> -->

      <p>Modificar recorrido</p>
    <form method="post" action="./">
        <input type="text" name="nombreLinea" placeholder="Nombre de la linea">
        <input type="text" name="origenLinea" placeholder="Origen de la linea">
        <input type="text" name="destinoLinea" placeholder="Destino de la linea">
            <select name="numeroParadaOrigen" id="numeroParadaOrigenTramo">
                <option value="Seleccione tramo 1" selected>Seleccione la primera parada del recorrido</option>
            </select>
            <input type="text" name="origenTramo" placeholder="Origen del tramo">
            <input type="text" name="destinoTramo" placeholder="Destino del tramo">
        <input type="submit" name="modifyRoute">
    </form>

    <script src="../js/modules/numberBusStop.js" type='module'></script>
    <script src="../js/modules/stopRoutes.js" type='module'></script>
</body>

</html>