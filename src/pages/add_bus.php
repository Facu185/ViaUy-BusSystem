<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form method="post" action="./add_Bus">
        <input type="text" name="matricula" placeholder="matricula unidad">
        <input type="text" name="cantAsientos" placeholder="cantidad de asientos">
        <input type="text" name="tipoAsientos" placeholder="tipo de asientos">
        <input type="text" name="caracteristicas" placeholder="caracteristicas">
        <input class="button--primary" type="submit" name="addBusButton">
    </form>

    <form method="post" action="./addBusStop">
        <input type="text" name="numeroParada" placeholder="Numero de parada">
        <input type="text" name="localizacion" placeholder="localizacion">
        <input type="text" name="latitud" placeholder="latitud">
        <input type="text" name="longitud" placeholder="longitud">
        <input class="button--primary" type="submit" name="addBusStop">
    </form>


    <form id="formulario" method="post" action="./addSection">
        <div id="form" class='test'>
            <select name="numeroParadaOrigen" id="numeroParadaOrigen">
                <option value="Parada de origen del tramo" selected>Parada de origen del tramo</option>
            </select>
            <select name="numeroParadaDestino" id="numeroParadaDestino">
                <option value="Parada de destino del tramo" selected>Parada de destino del tramo</option>
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
        </div>
        <div id="additionalForms"> </div>
        <input type="submit" name="addSection">
    </form>




    <button id="showFormButton" >Mostrar formulario adicional</button>




    <form method="post" action="./addRoute">
        <input type="text" name="nombreLinea" placeholder="Nombre de la linea">
        <input type="text" name="origenLinea" placeholder="Origen de la linea">
        <input type="text" name="destinoLinea" placeholder="Destino de la linea">
        <div id="tramo_original">
            <select name="numeroParadaOrigen" id="numeroParadaOrigenTramo">
                <option value="Seleccione tramo 1" selected>Seleccione la primera parada del recorrido</option>
            </select>
            <input type="text" name="origenTramo" placeholder="Origen del tramo">
            <input type="text" name="destinoTramo" placeholder="Destino del tramo">
        </div>
        <div id="nuevo_tramo"></div>
        <input type="submit" name="addRoute">
    </form>
    <button id="showTramoButton">Mostrar tramo adicional</button>

    <script src="../js/modules/moreSections.js" type='module'></script>
    <script src="../js/modules/stopRoutes.js" type='module'></script>
    <script src="../js/modules/numberBusStop.js" type='module'></script>
    <script src="../js/modules/moreRoutes.js" type='module'></script>
</body>

</html>