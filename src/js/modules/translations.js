const loadTranslate = async () => {
  try {
    const response = await fetch("../assets/translations.json");
    const data = await response.json();
    return data;
  } catch (error) {
    console.error(error);
  }
};
const translate = async (language) => {
  const data = await loadTranslate();
  if (document.getElementById("loginWelcome")) {
    document.getElementById("loginWelcome").innerText =
      data[language].loginWelcome;
    document.getElementById("loginMessage").innerText =
      data[language].loginMessage;
    document.getElementById("loginPassword").placeholder =
      data[language].inputPassword;
    document.getElementById("loginButton").value = data[language].buttonLogin;
    document.getElementById("loginNoAccount").innerHTML =
      data[language].noAccountMessage +
      ' <a href="../pages/register.php" id="loginGoRegister"></a>';
    document.getElementById("loginGoRegister").innerText =
      data[language].goToRegister;
    document.getElementById("loginTerms").innerHTML =
      data[language].conditions + ' <span id="loginConditions"> </span>';
    document.getElementById("loginConditions").innerText = data[language].terms;
  }
  if(document.getElementById("registerWelcome")){
    document.getElementById("registerWelcome").textContent =
    data[language].registerWelcome;
  document.getElementById("registerMessage").innerText =
    data[language].registerMessage;
  document.getElementById("registerTextName").textContent =
    data[language].registerTextName;
  document.getElementById("registerName").placeholder =
    data[language].refisterName;
  document.getElementById("registerTextLastName").textContent =
    data[language].registerTextLastName;
  document.getElementById("registerLastName").placeholder =
    data[language].registerLastName;
  document.getElementById("registerTextPhone").textContent =
    data[language].registerTextPhone;
  document.getElementById("registerPhone").placeholder =
    data[language].registerPhone;
  document.getElementById("registerTextEmail").textContent =
    data[language].registerTextEmail;
  document.getElementById("registerTextPassword").textContent =
    data[language].registerTextPassword;
  document.getElementById("registerPassword").placeholder =
    data[language].registerPassword;
  document.getElementById("registerButton").value =
    data[language].registerButton;
  }
  if( document.getElementById("homeLanguage")){
    document.getElementById("homeLanguage").textContent =
    data[language].homeLanguage;
    document.getElementById("enHome").textContent =
    data[language].enHome;
    document.getElementById("esHome").textContent =
    data[language].esHome;
    document.getElementById("prHome").textContent =
    data[language].prHome;
    document.getElementById("homeSesion").textContent =
    data[language].homeSesion;
    document.getElementById("homeLogin").textContent =
    data[language].homeLogin;
    document.getElementById("homeRegister").textContent =
    data[language].homeRegister;
    document.getElementById("homeWelcome").textContent =
    data[language].homeWelcome;
    document.getElementById("homeMessage").textContent =
    data[language].homeMessage;
    document.getElementById("homeOrigin").placeholder =
    data[language].homeOrigin;
    document.getElementById("homeDestination").placeholder =
    data[language].homeDestination;
    document.getElementById("homeButton").textContent =
    data[language].homeButton;
    document.getElementById("homeTravels").textContent =
    data[language].homeTravels;
    document.getElementById("homeStartingPoint").textContent =
    data[language].homeStartingPoint;
    document.getElementById("homeArrivalPoint").textContent =
    data[language].homeArrivalPoint;
    document.getElementById("homeStart").textContent =
    data[language].homeStart;
    document.getElementById("homeTravelsGo").textContent =
    data[language].homeTravelsGo;
    document.getElementById("homeRoutes").textContent =
    data[language].homeRoutes;
    document.getElementById("homePorfile").textContent =
    data[language].homeProfile;
  }
  if(document.getElementById("travelsSelected")){
    document.getElementById("travelsSelected").textContent =
    data[language].travelsSelected;
    document.getElementById("travelsHome").textContent =
    data[language].travelsHome;
    document.getElementById("travelsGo").textContent =
    data[language].travelsGo;
    document.getElementById("travelsRoutes").textContent =
    data[language].travelsRoutes;
    document.getElementById("travelsPorfile").textContent =
    data[language].travelsProfile;
  }
  if(document.getElementById("porfileName")){
    document.getElementById("porfileName").textContent =
    data[language].porfileName;
    document.getElementById("profileTextEmail").textContent =
    data[language].profileTextEmail;
    document.getElementById("profileTextPassword").textContent =
    data[language].profileTextPassword;
    document.getElementById("profilePassword").placeholder =
    data[language].profilePassword;
    document.getElementById("buttonProfile").textContent =
    data[language].buttonProfile;
    document.getElementById("profileHome").textContent =
    data[language].profileHome;
    document.getElementById("profileTravels").textContent =
    data[language].profileTravels;
    document.getElementById("profileRoutes").textContent =
    data[language].profileRoutes;
    document.getElementById("profileProfile").textContent =
    data[language].profileProfile;
  }
};
export default translate;
