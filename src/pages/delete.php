<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Eliminar unidad</p>
    <form method="post" action="./deleteBus">
        <input type="text" name="matricula" placeholder="matricula unidad">
        <input class="button--primary" type="submit" name="deleteBus">
    </form>

    <p>Eliminar parada</p>
    <!-- <form method="post" action="./deleteLine">
        <select name="numeroParadaOrigen" id="numeroParadaOrigen">
            <option value="Parada de origen del tramo" selected>Parada de origen del tramo</option>
        </select>
        <input class="button--primary" type="submit" name="deleteBusStop">
    </form> -->
    <p>Eliminar linea</p>
    <form method="post" action="./deleteLine">
        <input type="text" name="nombreLinea" placeholder="Nombre de la linea">
        <input type="submit" name="deleteLine">
    </form>

    <p>Eliminar tramos</p>
    <form method="post" action="./deleteSection">
        <select name="numeroParadaOrigen" id="numeroParadaOrigen">
            <option value="Parada de origen del tramo" selected>Parada de origen del tramo</option>
        </select>
        <select name="numeroParadaDestino" id="numeroParadaDestino">
            <option value="Parada de destino del tramo" selected>Parada de destino del tramo</option>
        </select>
        <input type="submit" name="deleteSection">
    </form>

    <script src="../js/modules/numberBusStop.js" type='module'></script>

</body>

</html>