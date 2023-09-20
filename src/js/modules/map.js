// Crea un mapa en el elemento 'map' y establece la vista inicial
var map = L.map("map").setView([-32.875554, -56.020152], 7);

// Agrega una capa de OpenStreetMap usando Leaflet-OSM
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

// Agrega los límites administrativos de Uruguay desde una URL externa
var uruguayGeoJSON = L.geoJSON(null, {
  style: {
    color: "blue",
    weight: 2,
    fillOpacity: 0,
  },
}).addTo(map);

// URL del archivo GeoJSON externo
var geoJSONURL = "https://www.openstreetmap.org/relation/287072"; // Reemplaza esto con la URL real

// Carga los datos GeoJSON desde la URL externa
const mapa = async () => {
  try {
    const response = await fetch(geoJSONURL);
    const data = await response.json();
    uruguayGeoJSON.addData(data);
  } catch (error) {
    console.error("Error al cargar los datos GeoJSON:", error);
  }
};
