fetch("../controllers/originDestination.php")
  .then((response) => response.json())
  .then((opciones) => {
    const opcionesSelect1 = document.getElementById("homeOrigin");
    const opcionesSelect2 = document.getElementById("homeDestination");

    opciones.forEach((opcion) => {
      const option1 = document.createElement("option");
      option1.value = opcion;
      option1.textContent = opcion;
      opcionesSelect1.appendChild(option1);

      const option2 = document.createElement("option");
      option2.value = opcion;
      option2.textContent = opcion;
      opcionesSelect2.appendChild(option2);
    });
  })
  .catch((error) => {
    console.error("Error al obtener datos:", error);
  });
