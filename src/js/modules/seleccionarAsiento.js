const asiento = document.getElementById("asiento");
const disponibles = document.getElementsByClassName("seats__seat");
for (let i = 0; i < disponibles.length; i++) {
  if (disponibles[i].classList.contains("seat__avaiable")) {
    disponibles[i].addEventListener("click", () => {

      const elementosConClase = document.querySelectorAll(".seat__avaiable");
      elementosConClase.forEach(function (elemento) {
        elemento.classList.remove("active__seat");
      });

      asiento.value = i + 1;
      disponibles[i].classList.add("active__seat");
      console.log(asiento.value)
    });
  }
}
