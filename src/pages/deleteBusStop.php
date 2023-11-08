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
            <h3>Eliminar parada</h3>
            <form method="post" action="./deleteLine">
                <select name="numeroParadaOrigen" id="numeroParadaOrigen">
                    <option value="Parada a eliminar" selected>Parada a eliminar</option>
                </select>
                <input class="button--primary" type="submit" name="deleteBusStop" value="Eliminar parada">
            </form>
        </section>
    </main>
    <script src="../js/modules/sideBar.js" type='module'></script>
</body>

</html>