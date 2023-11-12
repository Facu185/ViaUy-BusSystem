<?php
if (!empty($_SESSION["login"]) && !empty($_SESSION["rol"])) {
    $login = $_SESSION["login"];
    $rol = $_SESSION["rol"];
} elseif (empty($_SESSION["login"]) && empty($_SESSION["rol"])) {
    header("location:./login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/modules/statics.js" type="module"></script>
    <title>Via Uy - Admin</title>
</head>

<body>
    <main class="admin__main">
        <?php include_once "./components/AdminSidebar.php"; ?>
        <section class="main__main">
            <h3>Estadisticas</h3>
            <form id="staticsForm" method="post" action="./statics">
                <input type="date" name="fDate">
                <input type="date" name="sDate">
                <input class="button--tertiary" type="submit" name="showstatics" value="Mostrar estadisticas"> 
            </form>
            <div style="width: 80%;">
                <canvas id="barChart"></canvas>
            </div>
        </section>
    </main>

    <script src="../js/modules/sideBar.js" type='module'></script>

</body>

</html>