export async function fetchData() {
    try {
      const response = await fetch("../controllers/stopRoutes.php");
      const data = await response.json(); // Obtén el conjunto de resultados completo

      const opcionesSelect1 = document.getElementById("numeroParadaOrigenTramo");
      

      data.forEach((row) => {
        const option1 = document.createElement("option");
        option1.value = row["ID_tramo"];
        option1.textContent = row["Numero_parada_1"]+" - "+row["Numero_parada_2"];
        opcionesSelect1.appendChild(option1);

      });
    } catch (error) {
      console.error("Error al obtener datos:", error);
    }
}

fetchData();
