<?php

if (!empty($_SESSION["login"])) {
    $login = $_SESSION["login"];
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Routes</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/2940ba2046.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

  <?php include('./components/menu.php'); ?>
  <div id="map"></div>

  <section class="routes__selector">
    <form method="POST" action="./travels">
      <input type="hidden" placeholder="Origen" id="homeOrigin" name="origen">

      <input type="hidden" placeholder="Destino" id="homeDestination" name="destino">

      <input class="fecha"  type="date" name="date">
      <input class="button--primary" id="homeButton" type="submit" value="Buscar">
    </form>
  </section>
  <?php include('./components/navbar.php'); ?>

  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

  <script src="../js/modules/map.js" type="module"></script>
  <script src="../js/index.js" type="module"></script>
</body>

</html>