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
      ' <a href="./register" id="loginGoRegister"></a>';
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
      data[language].registerName;
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
    if (document.getElementById("homeSesion")) {
      document.getElementById("homeSesion").textContent =
        data[language].homeSesion;
    }

    if (document.getElementById("homeLogin")) {
      document.getElementById("homeLogin").textContent =
        data[language].homeLogin;
      document.getElementById("homeRegister").textContent =
        data[language].homeRegister;
    } else {
      document.getElementById("closeSesion").textContent =
        data[language].closeSesion;
    }

    if (document.getElementById("homeWelcome")) {
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
      if (document.getElementById("homeTravels")) {
        document.getElementById("homeTravels").textContent =
        data[language].homeTravels;
      document.getElementById("homeStartingPoint").textContent =
        data[language].homeStartingPoint;
      document.getElementById("homeArrivalPoint").textContent =
        data[language].homeArrivalPoint;
      document.getElementById("homeStartingPoint1").textContent =
        data[language].homeStartingPoint1;
      document.getElementById("homeArrivalPoint1").textContent =
        data[language].homeArrivalPoint1;
      }
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
      document.getElementById("frecuencyHometxt").textContent =
        data[language].frecuencyHometxt;
      document.getElementById("textAbout").textContent =
        data[language].textAbout;
      document.getElementById("navigateFooter").textContent =
        data[language].navigateFooter;
      document.getElementById("socialFooter").textContent =
        data[language].socialFooter;
        document.getElementById("footerContactTitle").textContent =
        data[language].footerContactTitle;
      document.getElementById("footerHome").textContent =
        data[language].homeStart;
      document.getElementById("footerRoutes").textContent =
        data[language].homeRoutes;
      document.getElementById("footerAbout").textContent =
        data[language].homeAbout;
      document.getElementById("footerService").textContent =
        data[language].homeService;
      document.getElementById("footerContact").textContent =
        data[language].homeContact;
      document.getElementById("homeStart").textContent =
        data[language].homeStart;
      document.getElementById("homeRoutes").textContent =
        data[language].homeRoutes;
      if (document.getElementById("homeProfile")) {
        document.getElementById("homeProfile").textContent =
          data[language].homeProfile;
        document.getElementById("aboutFooter").textContent =
          data[language].homeAbout;
      }
      document.getElementById("homeAbout").textContent =
        data[language].homeAbout;
      document.getElementById("homeService").textContent =
        data[language].homeService;
      document.getElementById("homeContact").textContent =
        data[language].homeContact;
    }
  }

  if (document.getElementById("homeLanguage")) {
    document.getElementById("homeLanguage").textContent =
      data[language].homeLanguage;

    if (document.getElementById("homeSesion")) {
      document.getElementById("homeSesion").textContent =
        data[language].homeSesion;
    }

    if (document.getElementById("homeLogin")) {
      document.getElementById("homeLogin").textContent =
        data[language].homeLogin;
      document.getElementById("homeRegister").textContent =
        data[language].homeRegister;
    } else {
      document.getElementById("closeSesion").textContent =
        data[language].closeSesion;
    }

    if (document.getElementById("homeLanguage")) {
      document.getElementById("homeLanguage").textContent =
        data[language].homeLanguage;
      if (document.getElementById("homeSesion")) {
        document.getElementById("homeSesion").textContent =
          data[language].homeSesion;
      }

      if (document.getElementById("homeLogin")) {
        document.getElementById("homeLogin").textContent =
          data[language].homeLogin;
        document.getElementById("homeRegister").textContent =
          data[language].homeRegister;
      } else {
        document.getElementById("closeSesion").textContent =
          data[language].closeSesion;
      }
      if (document.getElementById("travelsSelected")) {
        document.getElementById("travelsSelected").textContent =
          data[language].travelsSelected;
      }

      document.getElementById("homeStart").textContent =
        data[language].homeStart;
      document.getElementById("homeRoutes").textContent =
        data[language].homeRoutes;
    }
    if (document.getElementById("homeProfile")) {
      document.getElementById("homeProfile").textContent =
        data[language].homeProfile;
    }
    document.getElementById("homeAbout").textContent = data[language].homeAbout;
    document.getElementById("homeService").textContent =
      data[language].homeService;
    document.getElementById("homeContact").textContent =
      data[language].homeContact;
  }

  if (document.getElementById("homeLanguage")) {
    document.getElementById("homeLanguage").textContent =
      data[language].homeLanguage;

    if (document.getElementById("homeSesion")) {
      document.getElementById("homeSesion").textContent =
        data[language].homeSesion;
    }

    if (document.getElementById("homeLogin")) {
      document.getElementById("homeLogin").textContent = null;
      document.getElementById("homeRegister").textContent = null;
    } else {
      document.getElementById("closeSesion").textContent =
        data[language].closeSesion;
    }
    if (document.getElementById("profileWelcome")) {
      document.getElementById("profileWelcome").textContent =
        data[language].profileWelcome;
      document.getElementById("profileData").textContent =
        data[language].profileData;
      document.getElementById("profileName").textContent =
        data[language].profileName;
      document.getElementById("profileSurname").textContent =
        data[language].profileSurname;
      document.getElementById("profilePhone").textContent =
        data[language].profilePhone;
      document.getElementById("profileMail").textContent =
        data[language].profileMail;
      document.getElementById("profileSettings").textContent =
        data[language].profileSettings;
      document.getElementById("profileTravels").textContent =
        data[language].profileTravels;
      document.getElementById("profileModify").textContent =
        data[language].profileModify;
      document.getElementById("mineTravels").textContent =
        data[language].mineTravels;
    }

    document.getElementById("homeStart").textContent = data[language].homeStart;
    document.getElementById("homeRoutes").textContent =
      data[language].homeRoutes;
    if (document.getElementById("homeProfile")) {
      document.getElementById("homeProfile").textContent =
        data[language].homeProfile;
    }
    document.getElementById("homeAbout").textContent = data[language].homeAbout;
    document.getElementById("homeService").textContent =
      data[language].homeService;
    document.getElementById("homeContact").textContent =
      data[language].homeContact;
  }

  if (document.getElementById("homeLanguage")) {
    document.getElementById("homeLanguage").textContent =
      data[language].homeLanguage;

    if (document.getElementById("homeLogin")) {
      document.getElementById("homeLogin").textContent =
        data[language].homeLogin;
      document.getElementById("homeRegister").textContent =
        data[language].homeRegister;
    } else {
      document.getElementById("closeSesion").textContent =
        data[language].closeSesion;
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
    }

    if (document.getElementById("textAbout")) {
      document.getElementById("textAbout").textContent =
        data[language].textAbout;
      document.getElementById("navigateFooter").textContent =
        data[language].navigateFooter;
      document.getElementById("socialFooter").textContent =
        data[language].socialFooter;
        document.getElementById("footerContactTitle").textContent =
        data[language].footerContactTitle;
      document.getElementById("footerHome").textContent =
        data[language].homeStart;
      document.getElementById("footerRoutes").textContent =
        data[language].homeRoutes;
      document.getElementById("footerAbout").textContent =
        data[language].homeAbout;
      document.getElementById("footerService").textContent =
        data[language].homeService;
      document.getElementById("footerContact").textContent =
        data[language].homeContact;
      document.getElementById("homeStart").textContent =
        data[language].homeStart;
      document.getElementById("homeRoutes").textContent =
        data[language].homeRoutes;
    }
    if (document.getElementById("homeProfile")) {
      document.getElementById("homeProfile").textContent =
        data[language].homeProfile;
    }
    document.getElementById("homeAbout").textContent = data[language].homeAbout;
    document.getElementById("homeService").textContent =
      data[language].homeService;
    document.getElementById("homeContact").textContent =
      data[language].homeContact;
  }
  if (document.getElementById("homeLanguage")) {
    document.getElementById("homeLanguage").textContent =
      data[language].homeLanguage;

    if (document.getElementById("homeLogin")) {
      document.getElementById("homeLogin").textContent =
        data[language].homeLogin;
      document.getElementById("homeRegister").textContent =
        data[language].homeRegister;
    } else {
      document.getElementById("closeSesion").textContent =
        data[language].closeSesion;
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
    }

    if (document.getElementById("textAbout")) {
      document.getElementById("textAbout").textContent =
        data[language].textAbout;
      document.getElementById("navigateFooter").textContent =
        data[language].navigateFooter;
      document.getElementById("socialFooter").textContent =
        data[language].socialFooter;
        document.getElementById("footerContactTitle").textContent =
        data[language].footerContactTitle;
      document.getElementById("footerHome").textContent =
        data[language].homeStart;
      document.getElementById("footerRoutes").textContent =
        data[language].homeRoutes;
      document.getElementById("footerAbout").textContent =
        data[language].homeAbout;
      document.getElementById("footerService").textContent =
        data[language].homeService;
      document.getElementById("footerContact").textContent =
        data[language].homeContact;
      document.getElementById("aboutFooter").textContent =
        data[language].homeAbout;
    }

    document.getElementById("homeStart").textContent = data[language].homeStart;
    document.getElementById("homeRoutes").textContent =
      data[language].homeRoutes;
    document.getElementById("homeAbout").textContent = data[language].homeAbout;

    document.getElementById("homeService").textContent =
      data[language].homeService;

    document.getElementById("homeContact").textContent =
      data[language].homeContact;
  }
  if (document.getElementById("homeProfile")) {
    document.getElementById("homeProfile").textContent =
      data[language].homeProfile;
  }
  if (document.getElementById("homeLanguage")) {
    document.getElementById("homeLanguage").textContent =
      data[language].homeLanguage;

    if (document.getElementById("homeSesion")) {
      document.getElementById("homeSesion").textContent =
        data[language].homeSesion;
    }

    if (document.getElementById("homeLogin")) {
      document.getElementById("homeLogin").textContent =
        data[language].homeLogin;
      document.getElementById("homeRegister").textContent =
        data[language].homeRegister;
    } else {
      document.getElementById("closeSesion").textContent =
        data[language].closeSesion;
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
    }

    if (document.getElementById("textAbout")) {
      document.getElementById("textAbout").textContent =
        data[language].textAbout;
      document.getElementById("navigateFooter").textContent =
        data[language].navigateFooter;
      document.getElementById("socialFooter").textContent =
        data[language].socialFooter;
        document.getElementById("footerContactTitle").textContent =
        data[language].footerContactTitle;
      document.getElementById("footerHome").textContent =
        data[language].homeStart;
      document.getElementById("footerRoutes").textContent =
        data[language].homeRoutes;
      document.getElementById("footerAbout").textContent =
        data[language].homeAbout;
      document.getElementById("footerService").textContent =
        data[language].homeService;
      document.getElementById("footerContact").textContent =
        data[language].homeContact;
      document.getElementById("aboutFooter").textContent =
        data[language].homeAbout;
    }

    document.getElementById("homeStart").textContent = data[language].homeStart;
    document.getElementById("homeRoutes").textContent =
      data[language].homeRoutes;
    if (document.getElementById("homeProfile")) {
      document.getElementById("homeProfile").textContent =
        data[language].homeProfile;
    }
    document.getElementById("homeAbout").textContent = data[language].homeAbout;
    document.getElementById("homeService").textContent =
      data[language].homeService;
    document.getElementById("homeContact").textContent =
      data[language].homeContact;
  }

  if (document.getElementById("homeLanguage")) {
    document.getElementById("homeLanguage").textContent =
      data[language].homeLanguage;

    if (document.getElementById("homeSesion")) {
      document.getElementById("homeSesion").textContent =
        data[language].homeSesion;
    }

    if (document.getElementById("homeLogin")) {
      document.getElementById("homeLogin").textContent =
        data[language].homeLogin;
      document.getElementById("homeRegister").textContent =
        data[language].homeRegister;
    } else {
      document.getElementById("closeSesion").textContent =
        data[language].closeSesion;
    }
    if (document.getElementById("seattxt")) {
      document.getElementById("seattxt").textContent = data[language].seattxt;
      document.getElementById("seatbutton").value = data[language].seatbutton;
    }

    document.getElementById("homeAbout").textContent = data[language].homeAbout;
    document.getElementById("homeService").textContent =
      data[language].homeService;
    document.getElementById("homeContact").textContent =
      data[language].homeContact;
  }
  if (document.getElementById("homeLanguage")) {
    document.getElementById("homeLanguage").textContent =
      data[language].homeLanguage;

    if (document.getElementById("homeSesion")) {
      document.getElementById("homeSesion").textContent =
        data[language].homeSesion;
    }
    if (document.getElementById("homeLogin")) {
      document.getElementById("homeLogin").textContent =
        data[language].homeLogin;
      document.getElementById("homeRegister").textContent =
        data[language].homeRegister;
    } else {
      document.getElementById("closeSesion").textContent =
        data[language].closeSesion;
    }
    if (document.getElementById("confirmTitle")) {
      document.getElementById("confirmTitle").textContent =
        data[language].confirmTitle;
      document.getElementById("confirmOrigin").textContent =
        data[language].confirmOrigin;
      document.getElementById("confirmDestination").textContent =
        data[language].confirmDestination;
      document.getElementById("confimSeat").textContent =
        data[language].confimSeat;
      document.getElementById("hourStart").textContent =
        data[language].hourStart;
      document.getElementById("hourArraival").textContent =
        data[language].hourArraival;
      document.getElementById("confirmCaracteristics").textContent =
        data[language].confirmCaracteristics;
      document.getElementById("confirmPrice").textContent =
        data[language].confirmPrice;
      document.getElementById("confirmDate").textContent =
        data[language].confirmDate;
      document.getElementById("comfimPayment").textContent =
        data[language].comfimPayment;
      document.getElementById("creditPayment").textContent =
        data[language].creditPayment;
      document.getElementById("debitPayment").textContent =
        data[language].debitPayment;
      document.getElementById("cashPayment").textContent =
        data[language].cashPayment;
      document.getElementById("booking").value = data[language].booking;
      document.getElementById("confirmBuy").value = data[language].confirmBuy;
    }
    document.getElementById("homeAbout").textContent = data[language].homeAbout;
    document.getElementById("homeService").textContent =
      data[language].homeService;
    document.getElementById("homeContact").textContent =
      data[language].homeContact;
  }
};
export default translate;
