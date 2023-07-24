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
  if (document.getElementById("registerWelcome")) {
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
  if (document.getElementById("homeLanguage")) {
    document.getElementById("homeLanguage").textContent =
      data[language].homeLanguage;
    document.getElementById("enHome").textContent = data[language].enHome;
    document.getElementById("esHome").textContent = data[language].esHome;
    document.getElementById("prHome").textContent = data[language].prHome;
    document.getElementById("homeSesion").textContent =
      data[language].homeSesion;
    document.getElementById("homeLogin").textContent = data[language].homeLogin;
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
    document.getElementById("homeStart").textContent = data[language].homeStart;
    document.getElementById("homeTravelsGo").textContent =
      data[language].homeTravelsGo;
    document.getElementById("homeRoutes").textContent =
      data[language].homeRoutes;
    document.getElementById("homePorfile").textContent =
      data[language].homeProfile;
    document.getElementById("adHome").textContent = data[language].adHome;
    document.getElementById("likeHome").textContent = data[language].likeHome;
    document.getElementById("likeHometxt").textContent =
      data[language].likeHometxt;
    document.getElementById("frecuencyHome").textContent =
      data[language].frecuencyHome;
    document.getElementById("frecuencyHometxt").textContent =
      data[language].frecuencyHometxt;
    document.getElementById("pricesHome").textContent =
      data[language].pricesHome;
    document.getElementById("pricesHometxt").textContent =
      data[language].pricesHometxt;
    document.getElementById("copyHome").textContent = data[language].copyHome;
    document.getElementById("homeAbout").textContent = data[language].homeAbout;
    document.getElementById("homeService").textContent =
      data[language].homeService;
    document.getElementById("homeContact").textContent =
      data[language].homeContact;
  }
  if (document.getElementById("travelsSelected")) {
    document.getElementById("travelsSelected").textContent =
      data[language].travelsSelected;
    document.getElementById("travelsHome").textContent =
      data[language].travelsHome;
    document.getElementById("travelsGo").textContent = data[language].travelsGo;
    document.getElementById("travelsRoutes").textContent =
      data[language].travelsRoutes;
    document.getElementById("travelsProfile").textContent =
      data[language].travelsProfile;
    document.getElementById("travelsAbout").textContent =
      data[language].travelsAbout;
    document.getElementById("travelsService").textContent =
      data[language].travelsService;
    document.getElementById("travelsContact").textContent =
      data[language].travelsContact;
  }
  if (document.getElementById("porfileName")) {
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
    document.getElementById("profileAbout").textContent =
      data[language].profileAbout;
    document.getElementById("profileService").textContent =
      data[language].profileService;
    document.getElementById("profileContact").textContent =
      data[language].profileContact;
  }
  if (document.getElementById("aboutTitle")) {
    document.getElementById("aboutTitle").textContent =
      data[language].aboutTitle;
    document.getElementById("aboutFtext").textContent =
      data[language].aboutFtext;
    document.getElementById("aboutStext").textContent =
      data[language].aboutStext;
    document.getElementById("aboutConfort").textContent =
      data[language].aboutConfort;
    document.getElementById("aboutBus").textContent = data[language].aboutBus;
    document.getElementById("aboutBustxt").textContent =
      data[language].aboutBustxt;
    document.getElementById("aboutSecurity").textContent =
      data[language].aboutSecurity;
    document.getElementById("aboutSecuritytxt").textContent =
      data[language].aboutSecuritytxt;
    document.getElementById("aboutConforttitle").textContent =
      data[language].aboutConforttitle;
    document.getElementById("aboutConforttxt").textContent =
      data[language].aboutConforttxt;
    document.getElementById("aboutCopy").textContent = data[language].aboutCopy;
    document.getElementById("aboutHome").textContent = data[language].aboutHome;
    document.getElementById("aboutTravels").textContent =
      data[language].aboutTravels;
    document.getElementById("aboutRoutes").textContent =
      data[language].aboutRoutes;
    document.getElementById("aboutPorfile").textContent =
      data[language].aboutPorfile;
    document.getElementById("aboutAbout").textContent =
      data[language].aboutAbout;
    document.getElementById("aboutServices").textContent =
      data[language].aboutServices;
    document.getElementById("aboutContact").textContent =
      data[language].aboutContact;
  }
  if (document.getElementById("contactForm")) {
    document.getElementById("contactForm").innerHTML =
      data[language].contactForm + ' <span id="contactFormSpan"> </span>';
    document.getElementById("contactFormSpan").textContent =
      data[language].contactFormSpan;
    document.getElementById("contactFormttx").textContent =
      data[language].contactFormttx;
    document.getElementById("contactName").placeholder =
      data[language].contactName;
    document.getElementById("contactSubject").placeholder =
      data[language].contactSubject;
    document.getElementById("contactMessage").placeholder =
      data[language].contactMessage;
    document.getElementById("contactButton").textContent =
      data[language].contactButton;
    document.getElementById("contactCopy").textContent =
      data[language].contactCopy;
    document.getElementById("contactHome").textContent =
      data[language].contactHome;
    document.getElementById("contactTravel").textContent =
      data[language].contactTravel;
    document.getElementById("contactRoutes").textContent =
      data[language].contactRoutes;
    document.getElementById("contactPorfile").textContent =
      data[language].contactPorfile;
    document.getElementById("contactAbout").textContent =
      data[language].contactAbout;
    document.getElementById("contactService").textContent =
      data[language].contactService;
    document.getElementById("contactContact").textContent =
      data[language].contactContact;
  }
  if (document.getElementById("servicesRent")) {
    document.getElementById("servicesRent").innerHTML =
      data[language].servicesRent + ' <span id="servicesRentspan"> </span>';
    document.getElementById("servicesRentspan").textContent =
      data[language].servicesRentspan;
    document.getElementById("servicesRentText").textContent =
      data[language].servicesRentText;
    document.getElementById("servicesLines").innerHTML =
      data[language].servicesLines + ' <span id="servicesLinesspan"> </span>';
    document.getElementById("servicesLinesspan").textContent =
      data[language].servicesLinesspan;
    document.getElementById("servicesLinesText").textContent =
      data[language].servicesLinesText;
    document.getElementById("servicesTourism").innerHTML =
      data[language].servicesTourism +
      ' <span id="servicesTourismSpan"> </span>';
    document.getElementById("servicesTourismSpan").textContent =
      data[language].servicesTourismSpan;
    document.getElementById("servicesTourismText").textContent =
      data[language].servicesTourismText;
    document.getElementById("serviceExecutive").innerHTML =
      data[language].serviceExecutive +
      ' <span id="serviceExecutiveSpan"> </span>';
    document.getElementById("serviceExecutiveSpan").textContent =
      data[language].serviceExecutiveSpan;
    document.getElementById("serviceExecutiveText").textContent =
      data[language].serviceExecutiveText;
    document.getElementById("serviceTransport").innerHTML =
      data[language].serviceTransport +
      ' <span id="serviceTransportSpan"> </span>';
    document.getElementById("serviceTransportSpan").textContent =
      data[language].serviceTransportSpan;
    document.getElementById("serviceTransporttext").textContent =
      data[language].serviceTransporttext;
    document.getElementById("servicesShipment").innerHTML =
      data[language].servicesShipment +
      ' <span id="servicesShipmentSpan"> </span>';
    document.getElementById("servicesShipmentSpan").textContent =
      data[language].servicesShipmentSpan;
    document.getElementById("servicesShipmentText").textContent =
      data[language].servicesShipmentText;
    document.getElementById("serviceCustomer").innerHTML =
      data[language].serviceCustomer +
      ' <span id="serviceCustomerSpan"> </span>';
    document.getElementById("serviceCustomerSpan").textContent =
      data[language].serviceCustomerSpan;
    document.getElementById("serviceCustomerText").textContent =
      data[language].serviceCustomerText;
    document.getElementById("serviceCopy").textContent =
      data[language].serviceCopy;
    document.getElementById("serviceHome").textContent =
      data[language].serviceHome;
    document.getElementById("serviceTravel").textContent =
      data[language].serviceTravel;
    document.getElementById("serviceRoutes").textContent =
      data[language].serviceRoutes;
    document.getElementById("servicePorfile").textContent =
      data[language].servicePorfile;
    document.getElementById("serviceAbout").textContent =
      data[language].serviceAbout;
    document.getElementById("serviceService").textContent =
      data[language].serviceService;
    document.getElementById("serviceContact").textContent =
      data[language].serviceContact;
  }
};
export default translate;
