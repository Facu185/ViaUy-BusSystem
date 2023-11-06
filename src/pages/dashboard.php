<?php
if (!empty($_SESSION["login"]) && !empty($_SESSION["rol"])) {
    $login = $_SESSION["login"];
    $rol  = $_SESSION["rol"];
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
    <h2>Panel de administración</h2>
    <main class="admin__main">
    <?php
    if ($rol === 1):
        ?>
        <a href="./registerAdmin">Registrar un nuevo admin</a>
        <?php
    endif
    ?>
    <a href="./logout" id="closeSesion">cerrar sesion</a>
    <a href="./addBus">añadir unidad</a>
    <a href="./clients">Clientes</a>
    <a href="./delete">Eliminar</a>
    <a href="./modify">Modificar</a>
        <!-- <section class="admin__orders">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Trayecto</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                    <td>Germany</td>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                    <td>Germany</td>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                    <td>Germany</td>
                </tr>                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                    <td>Germany</td>
                </tr>                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                    <td>Germany</td>
                </tr>                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                    <td>Germany</td>
                </tr>                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                    <td>Germany</td>
                </tr>
            </table>
        </section> -->

        <form method="post" action="./statics">
            <p>fdate</p>
            <input type="date" name="fDate">
            <p>sdate</p>
            <input type="date" name="sDate">
            <input type="submit" name="showstatics">
        </form>
        <canvas id="barChart" width="400" height="200"></canvas>


      <!--   <section class="admin__monthRevenue">
            <div class="month__revenue">
                <p>Ganancias Mensuales</p>
                <p>$100.000</p>
                <p>Octubre - 2023</p>
            </div>
        </section>
        <section class="admin__graph">
        grafica
        </section>
        <section class="admin__monthSales">
        <div class="month__sales">
                <p>Ventas Mensuales</p>
                <p>534</p>
                <p>Octubre - 2023</p>
            </div>
        </section> -->
    </main>
    <script href="../js/modules/statics.js"></script>
</body>

</html>