<?php 
    class PageController{
        public function home(){
            include_once("./pages/home.php");
        }
        public function aboutUs(){
            include_once("./pages/aboutUs.php");
        }
        public function contact(){
            include_once("./pages/contact.php");
        }   
        public function login(){
            include_once("./pages/login.php");
        } 
        public function profile(){
            include_once("./pages/profile.php");
        } 
        public function register(){
            include_once("./pages/register.php");
        } 
        public function routes(){
            include_once("./pages/routes.php");
        } 
        public function services(){
            include_once("./pages/services.php");
        } 
        public function travels(){
            include_once("./pages/travels.php");
        } 
        public function logout(){
            include_once("./controllers/logout.php");
        }
        public function comprar(){
            include_once("./pages/buyTicket.php");
        }
        public function confirmarViaje(){
            include_once("./pages/confirmTravel.php");
        }
        public function seat(){
            include_once("./controllers/verifySeat.php");
        }
        public function signup(){
            include_once("./controllers/signup.php");
        }
        public function pdf(){
            include_once("./pages/pdf.php");
        }
        public function dashboard(){
            include_once("./pages/dashboard.php");
        }
        public function registerAdmin(){
            include_once("./pages/register_admin.php");
        }
        public function singupAdmin(){
            include_once("./controllers/singup_admin.php");
        }
        public function addBus(){
            include_once("./pages/add_bus.php");
        }
        public function add_Bus(){
            include_once("./controllers/addBus.php");
        }
        public function addBusStop(){
            include_once("./controllers/addBusStop.php");
        }
        public function addSection(){
            include_once("./controllers/addSection.php");
        }
        public function addRoute(){
            include_once("./controllers/addRoute.php");
        }
        public function clients(){
            include_once("./pages/clients.php");
        }
        public function lookClient(){
            include_once("./controllers/lookClient.php");
        }
        public function deleteClient(){
            include_once("./controllers/deleteClient.php");
        }
        public function confirmPassage(){
            include_once("./controllers/confirmPassage.php");
        }
        public function statics(){
            include_once("./controllers/statics.php");
        }
        public function deleteBus(){
            include_once("./controllers/deleteBus.php");
        }
        public function deleteBusStop(){
            include_once("./controllers/deleteBusStop.php");
        }
        public function  deleteLine(){
            include_once("./controllers/deleteLine.php");
        }
        public function  deleteSection(){
            include_once("./controllers/deleteSection.php");
        }
        public function modifyRoutePage(){
            include_once("./pages/modifyRoute.php");
        }
        public function  updateBus(){
            include_once("./controllers/updateBus.php");
        }
        public function  updateBusStop(){
            include_once("./controllers/modifyBusStop.php");
        }
        public function  modifySection(){
            include_once("./controllers/modifySection.php");
        }
        public function  modifyRoute(){
            include_once("./controllers/modifyRoute.php");
        }
        public function  modifyLine(){
            include_once("./controllers/modifyLine.php");
        }
        public function addBusStopPage(){
            include_once("./pages/addBusStop.php");
        }
        public function addBusSection(){
            include_once("./pages/addSection.php");
        }
        public function addRoutes(){
            include_once("./pages/addRoutes.php");
        }
        public function deleteBusPage(){
            include_once("./pages/deleteBus.php");
        }
        public function deleteBusStopPage(){
            include_once("./pages/deleteBusStop.php");
        }
        public function deleteLinePage(){
            include_once("./pages/deleteLine.php");
        }
        public function deleteSectionPage(){
            include_once("./pages/deleteSection.php");
        }
        public function modifyBus(){
            include_once("./pages/modifyBus.php");
        }
        public function modifyBusStop(){
            include_once("./pages/modifyBusStop.php");
        }
        public function modifySectionPage(){
            include_once("./pages/modifySection.php");
        }
        public function modifyLinePage(){
            include_once("./pages/modifyLine.php");
        }
        public function manageReservations(){
            include_once("./pages/manageReservations.php");
        }
    }
?>