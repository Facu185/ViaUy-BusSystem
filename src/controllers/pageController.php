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
        public function delete(){
            include_once("./pages/delete.php");
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
        public function modify(){
            include_once("./pages/modify.php");
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
    }
?>