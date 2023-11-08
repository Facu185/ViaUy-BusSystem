
var xhr = new XMLHttpRequest();
xhr.open("GET", "../controllers/statics.php", true);
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        var statistics = JSON.parse(xhr.responseText);

        // Prepara los datos para el gráfico
        var labels = [];
        var data = [];

        for (var i = 0; i < statistics.length; i++) {
            labels.push(statistics[i].Mes);
            data.push(statistics[i].SumaPrecios);
        }

        // Crea el gráfico de barras
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Suma de Precios',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de las barras
                    borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
};
xhr.send();