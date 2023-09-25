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
            include_once("./controlers/logout.php");
        }
        public function comprar(){
            include_once("./pages/buyTicket.php");
        }
        public function confirmarViaje(){
            include_once("./pages/confirmTravel.php");
        }
        public function seat(){
            include_once("./controlers/verifySeat.php");
        }

    }
?>