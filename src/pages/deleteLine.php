<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Document</title>
</head>

<body>
<?php include_once "./components/AdminSidebar.php"; ?>
    <p>Eliminar linea</p>
    <form method="post" action="./deleteLine">
        <input type="text" name="nombreLinea" placeholder="Nombre de la linea">
        <input type="submit" name="deleteLine">
    </form>
</body>

</html>