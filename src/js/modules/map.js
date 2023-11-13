var map = L.map("map").setView([-32.8755556, -56.0201526], 7);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
}).addTo(map);


var origen = null;
var destino = null;


var containerDiv = null;


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

       
        marker.on("click", function (e) {
          
          removeContainerDiv();

         
          containerDiv = document.createElement("div");
          containerDiv.className = "custom-container";

         
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

          
          var markerPos = map.latLngToContainerPoint(marker.getLatLng());
          containerDiv.style.position = "absolute";
          containerDiv.style.left = markerPos.x + "px";
          containerDiv.style.top = markerPos.y + "px";

          
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
