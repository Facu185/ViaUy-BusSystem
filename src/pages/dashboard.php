<?php
if (!empty($_SESSION["login"]) && !empty($_SESSION["rol"])) {
    $login = $_SESSION["login"];
    $rol = $_SESSION["rol"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <title>Via Uy - Admin</title>
</head>

<body>
    <main class="admin__main">
        <?php include_once "./components/AdminSidebar.php"; ?>
    </main>
    <script href="../js/modules/statics.js" type="module"></script>
    <script src="../js/modules/sideBar.js" type='module'></script>
</body>

</html>