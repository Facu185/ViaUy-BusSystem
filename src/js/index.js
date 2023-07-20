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

if (document.getElementById("engSwitcher")) {
  document.getElementById("engSwitcher").addEventListener("click", (e) => {
    e.preventDefault();
    localStorage.setItem("lang", "EN");
    location.reload();
  });
}
if (document.getElementById("esSwitcher")) {
  document.getElementById("esSwitcher").addEventListener("click", (e) => {
    e.preventDefault();
    localStorage.setItem("lang", "ES");
    location.reload();
  });
}
