<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Add bus</title>
</head>

<body>
    <main class="admin__main">
        <?php include_once "./components/AdminSidebar.php"; ?>
        <section class="main__main">
            <h3>Agregar unidad</h3>
            <form method="post" action="./add_Bus">
                <input type="number" name="matricula" placeholder="Nuemero de unidad">
                <input type="text" name="cantAsientos" placeholder="Cantidad de asientos">
                <input type="text" name="tipoAsientos" placeholder="Tipo de asientos">
                <input type="text" name="caracteristicas" placeholder="Caracteristicas de la unidad">
                <input class="button--primary" type="submit" name="addBusButton" value="Agregar unidad">
            </form>
        </section>
    </main>
    <script src="../js/modules/sideBar.js" type='module'></script>
</body>

</html>