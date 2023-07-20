/* import login from "./modules/login.js";
login(); */
import translate from "./modules/translations.js";
if (!localStorage.getItem("lang")) {
  localStorage.setItem("lang", "ES");
  translate("ES");
} else {
  const language = localStorage.getItem("lang");
  console.log(language);
  translate(language);
}

if (document.getElementById("enHome")) {
  document.getElementById("enHome").addEventListener("click", (e) => {
    e.preventDefault();
    localStorage.setItem("lang", "EN");
    location.reload();
  });
}
if (document.getElementById("esHome")) {
  document.getElementById("esHome").addEventListener("click", (e) => {
    e.preventDefault();
    localStorage.setItem("lang", "ES");
    location.reload();
  });
}
if (document.getElementById("prHome")) {
  document.getElementById("prHome").addEventListener("click", (e) => {
    e.preventDefault();
    localStorage.setItem("lang", "PR");
    location.reload();
  });
}
