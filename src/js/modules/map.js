var map = L.map("map").setView([-32.8755556, -56.0201526], 7);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
}).addTo(map);

// Variables para mantener las paradas de origen y destino
var origen = null;
var destino = null;

// Contenedor para los botones
var containerDiv = null;

// Realiza una solicitud AJAX para obtener los puntos desde PHP
$.ajax({
  url: "../controllers/findmap.php",
  method: "GET",
  dataType: "json",
  success: function (data) {
    data.forEach(function (punto) {
      var latitud = parseFloat(punto.latitud);
      var longitud = parseFloat(punto.longitud);

      if (!isNaN(latitud) && !isNaN(longitud)) {
        var marker = L.marker([latitud, longitud]).addTo(map);

        // Agrega eventos de clic al marcador
        marker.on("click", function (e) {
          // Elimina cualquier contenido previo en el contenedor
          removeContainerDiv();

          // Crea un nuevo contenedor
          containerDiv = document.createElement("div");
          containerDiv.className = "custom-container";

          // Crea botones dinámicamente y agrega eventos de clic
          var origenButton = createButton("Seleccionar como parada de origen", function () {
            var valorOrigen = (origen = punto.Localizacion);
            document.getElementById("homeOrigin").value = valorOrigen;
          });

          var destinoButton = createButton("Seleccionar como parada de destino", function () {
            var valorDestino = (destino = punto.Localizacion);
            document.getElementById("homeDestination").value = valorDestino;
          });

          var localizacionParrafo = document.createElement("p");
          localizacionParrafo.textContent = "Localización: " + punto.Localizacion;

          containerDiv.appendChild(origenButton);
          containerDiv.appendChild(destinoButton);
          containerDiv.appendChild(localizacionParrafo);

          // Posiciona el contenedor en la ubicación del marcador
          var markerPos = map.latLngToContainerPoint(marker.getLatLng());
          containerDiv.style.position = "absolute";
          containerDiv.style.left = markerPos.x + "px";
          containerDiv.style.top = markerPos.y + "px";

          // Agrega el contenedor al cuerpo del documento
          document.body.appendChild(containerDiv);
        });
      }
    });
  },
  error: function (xhr, status, error) {
    console.error("Error al obtener los puntos: " + error);
  },
});

// Función para crear un botón y agregar un evento de clic
function createButton(text, clickHandler) {
  var button = document.createElement("button");
  button.textContent = text;
  button.addEventListener("click", clickHandler);
  return button;
}

// Función para eliminar el contenedor actual
function removeContainerDiv() {
  if (containerDiv) {
    containerDiv.remove();
  }
}
