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
            <h3>Agregar parada</h3>
            <form method="post" action="./addBusStop">
                <input type="number" name="numeroParada" placeholder="Numero de parada">
                <input type="text" name="localizacion" placeholder="Localizacion">
                <input type="number" name="latitud" placeholder="Latitud">
                <input type="number" name="longitud" placeholder="Longitud">
                <input class="button--primary" type="submit" name="addBusStop" value="Agregar parada">
            </form>
        </section>
    </main>
    <script src="../js/modules/sideBar.js" type='module'></script>
</body>

</html>