// Configura el mapa centrado en Uruguay
var map = L.map("map").setView([-32.8755556, -56.0201526], 7); // Centro de Uruguay, zoom 7

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
}).addTo(map);

// Variables para mantener las paradas de origen y destino
var origen = null;
var destino = null;

// Variable para mantener el punto seleccionado y el contenedor
var puntoSeleccionado = null;
var containerDiv = null;

// Función para mostrar los botones y la localización
function mostrarBotonesYLocalizacion(punto) {
  // Eliminar cualquier contenido previo en el contenedor
  if (containerDiv) {
    while (containerDiv.firstChild) {
      containerDiv.removeChild(containerDiv.firstChild);
    }
  } else {
    // Si containerDiv es null, crea un nuevo contenedor
    containerDiv = document.createElement("div");
  }

  if (punto) {
    var origenButton = document.createElement("button");
    origenButton.textContent = "Seleccionar como parada de origen";
    origenButton.className = "seleccionar__origen"; 

    var destinoButton = document.createElement("button");
    destinoButton.textContent = "Seleccionar como parada de destino";
    destinoButton.className = "seleccionar__destino";


    origenButton.addEventListener("click", function () {
      var valorOrigen = (origen = punto.Localizacion);
      document.getElementById("homeOrigin").value = valorOrigen;
    });

    destinoButton.addEventListener("click", function () {
      var valorDestino = (destino = punto.Localizacion);
      document.getElementById("homeDestination").value = valorDestino;
    });

    var localizacionParrafo = document.createElement("p");
    localizacionParrafo.textContent = "Localización: " + punto.Localizacion;

    containerDiv.appendChild(origenButton);
    containerDiv.appendChild(destinoButton);
    containerDiv.appendChild(localizacionParrafo);

    map.getPanes().overlayPane.appendChild(containerDiv);

    // Actualizar el punto seleccionado
    puntoSeleccionado = punto;
  } else {
    // Si no se proporciona un punto, simplemente elimina el contenedor
    containerDiv = null;
    puntoSeleccionado = null;
  }
}

// Realiza una solicitud AJAX para obtener los puntos desde PHP
$.ajax({
  url: "../controlers/findmap.php", 
  method: "GET",
  dataType: "json",
  success: function (data) {
    data.forEach(function (punto) {
      var localizacion = punto.Localizacion; 

      var latitud = parseFloat(punto.latitud);
      var longitud = parseFloat(punto.longitud);

      if (!isNaN(latitud) && !isNaN(longitud)) {
        var marker = L.marker([latitud, longitud]).addTo(map);

        marker.on("click", function (e) {
          if (punto === puntoSeleccionado) {
            // Si se hace clic en el mismo punto, elimina los botones
            mostrarBotonesYLocalizacion(null);
          } else {
            // Si se hace clic en un nuevo punto, muestra los botones y la localización
            mostrarBotonesYLocalizacion(punto);
          }
        });
      }
    });
  },
  error: function (xhr, status, error) {
    console.error("Error al obtener los puntos: " + error);
  },
});
