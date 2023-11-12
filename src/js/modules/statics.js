/* $(document).ready(function () {
    $('#staticsForm').submit(function (event) {
        event.preventDefault(); // Evita que la página se recargue al enviar el formulario

        // Obtén los datos desde PHP
        $.ajax({
            url: '../controllers/statics.php',
            method: 'POST',
            data: {
                showstatics: true,
                fDate: $('input[name=fDate]').val(),
                sDate: $('input[name=sDate]').val()
            },
            dataType: 'json',
            success: function (response) {
                // Procesa los datos para el gráfico de barras
                var labels = [];
                var sumaPrecios = [];
                var compras = [];

                response.forEach(function (data) {
                    labels.push(data.Mes);
                    sumaPrecios.push(data.SumaPrecios);
                    compras.push(data.Compras);
                });

                // Crea el gráfico de barras en el contenedor con ID 'chartContainer'
                var ctx = document.getElementById('barChart').getContext('2d');
                var barChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Suma de Precios',
                                data: sumaPrecios,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Número de Compras',
                                data: compras,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            },
            error: function (error) {
                console.log('Error en la solicitud AJAX: ', error);
            }
        });
    });
}); */



/* const labels = ['Enero', 'Febrero', 'Marzo', 'Abril'];
const colors = ['rgb(69,177,223)', 'rgb(99,201,122)', 'rgb(203,82,82)', 'rgb(229,224,88)'];

const graph = document.getElementById("barChart");

// Realiza una solicitud AJAX para obtener los datos desde PHP
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const datos = JSON.parse(xhr.responseText);

        // Crea la configuración de la gráfica con los datos obtenidos
        const data = {
            labels: labels,
            datasets: [{
                data: datos,
                backgroundColor: colors
            }]
        };

        const config = {
            type: 'bar',
            data: data,
        };

        // Crea la gráfica con Chart.js
        new Chart(graph, config);
    }
};

// Especifica la URL del archivo PHP que proporciona los datos
xhr.open("GET", "../controllers/statics.php", true);
xhr.send(); */




/* const labels = ['Enero', 'Febrero', 'Marzo', 'Abril']
const colors = ['rgb(69,177,223)', 'rgb(99,201,122)', 'rgb(203,82,82)', 'rgb(229,224,88)'];
 
const graph = document.getElementById("barChart");
 
const data = {
    labels: labels,
    datasets: [{
        data: [1, 2, 3, 4],
        backgroundColor: colors
    }]
};
 
const config = {
    type: 'bar',
    data: data,
};
 
new Chart(graph, config);
 */