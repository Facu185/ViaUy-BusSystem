const register = () => {
  try {
    const name = document.getElementById("registerName").value;
    const lastName = document.getElementById("registerLastName").value;
    const phoneNumber = document.getElementById("registerPhone").value;
    const email = document.getElementById("registerEmail").value;
    const password = document.getElementById("registerPassword").value;

    function contieneNumeros(string) {
      var regex = /\d/;
      return regex.test(string);
    }

    if (contieneNumeros(name) || contieneNumeros(lastName))
      throw new Error("El nombre y el apellido no pueden contener numeros");

    if (!name || !lastName || !phoneNumber || !email || !password)
      throw new Error("falta completar campos");
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regexEmail.test(email))
      throw new Error("Direccion de correo electronico no valida");
    if (password.length < 6)
      throw new Error("La contraseña no puede ser menor a 6 digitos");
    if (phoneNumber.length !== 9)
      throw new Error("El numero de telefono debe ser de 9 digitos");
    let existEmail = data.filter((e) => e.email === email);
    if (existEmail.length > 0)
      throw new Error("Ya existe un usuario con este email");

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
  } catch (error) {
    console.error(error);
  }
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
