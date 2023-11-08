<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Document</title>
</head>

<body>
    <main class="admin__main">
        <?php include_once "./components/AdminSidebar.php"; ?>
        <section class="main__main">
            <form method="post" action="./addRoute">
                <input type="text" name="nombreLinea" placeholder="Nombre de la linea">
                <input type="text" name="origenLinea" placeholder="Origen de la linea">
                <div class="arreglo">
                    <input type="text" name="destinoLinea" placeholder="Destino de la linea">
                    <input type="button" id="showTramoButton" class="button--tertiary"
                    value="Mostrar tramo adicional"></input>
                </div>
                
                <div id="tramo_original">
                    <select name="numeroParadaOrigen" id="numeroParadaOrigenTramo">
                        <option value="Seleccione tramo 1" selected>Seleccione la primera parada del recorrido</option>
                    </select>
                    <input type="text" name="origenTramo" placeholder="Origen del tramo">
                    <input type="text" name="destinoTramo" placeholder="Destino del tramo">

                </div>
                <div id="nuevo_tramo"></div>
                <input type="submit" name="addRoute" value="Añadir recorridos" class="button--tertiary arreglo2">
            </form>

        </section>
    </main>

    <script src="../js/modules/sideBar.js" type='module'></script>
    <script src="../js/modules/stopRoutes.js" type='module'></script>
    <script src="../js/modules/moreRoutes.js" type='module'></script>
</body>

</html>