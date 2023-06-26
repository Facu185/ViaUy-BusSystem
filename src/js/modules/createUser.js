const register = () => {
  const name = document.getElementById("registerName").value;
  const lastName = document.getElementById("registerLastName").value;
  const phoneNumber = document.getElementById("registerPhone").value;
  const email = document.getElementById("registerEmail").value;
  const password = document.getElementById("registerPassword").value;

  if (!name || !lastName || !phoneNumber || !email || !password) {
    console.log("falta completar campos");
    return;
  }
  const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!regexEmail.test(email)) {
    console.log("Dirección de correo electrónico invalida");
    return;
  }
  if(password.length < 6){
    console.log("La contraseña es muy corta");
    return;
  }
  if(phoneNumber.length !== 9){
    console.log("El telefono debe ser de 9 caracteres");
    return;
  }
  let existEmail = data.filter(e => e.email === email);
  if(existEmail.length > 0){
    console.log("Este email ya esta registrado.")
    return;
  }
  function Users({ email, password, name, lastName, phoneNumber }) {
    this.email = email;
    this.password = password;
    this.name = name;
    this.lastName = lastName;
    this.phoneNumber = phoneNumber;
  }
  let user = new Users({
    email,
    password,
    name,
    lastName,
    phoneNumber,
  });
  data.push(user);
  localStorage.setItem("login", JSON.stringify(data));
  console.log("La cuenta fue creada con exito");
  return user;
};
const registerButton = document.getElementById("registerButton");
if (!localStorage.getItem("login")) {
  var data = [];
  localStorage.setItem("login", JSON.stringify([]));
} else {
  var data = JSON.parse(localStorage.getItem("login"));
}
registerButton.addEventListener("click", (e) => {
  e.preventDefault();
  register();
});
