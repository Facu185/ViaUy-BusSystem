
function login() {
  //recuperamos el valor de los input
  const loginButton = document.getElementById("loginButton");
  function checkCredentials (){
    const email = document.getElementById("loginEmail").value;
    const password = document.getElementById("loginPassword").value;
    let exist = data.filter(e => e.password === password && e.email === email);
    if(exist.length > 0){
      console.log("entro");
    }else{
      console.log("la cuenta que ingreso no es valida");
    }
  }  
  var data = [];
  if (!localStorage.getItem("login")) {
    localStorage.setItem("login", JSON.stringify([]));
    var data = [];
  } else {
    var data = JSON.parse(localStorage.getItem("login"));
  }
  console.log(data);
  loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    checkCredentials();
  })
}

export default login;
