<?php
class Router
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->matchRoute();
    }

    public function matchRoute()
    {
        try {
            $url = explode("/", URL);
            $this->controller = !empty($url[1]) ? $url[1] : "pages";
            $this->method = !empty($url[2]) ? $url[2] : "home";
            $this->controller = $this->controller . "Controller";
            require_once(__DIR__ . "\controlers/" . $this->controller . ".php");
        } catch (Exception $error) {
            print_r($error);
        }

    }

    public function run()
    {
        try {
            $controller = new $this->controller();
            $method = $this->method;
            if ($method !== 'login') {
                include_once('./controlers/signin.php');
                if (empty($_SESSION['login']) && $method === "profile" ) {
                    include_once('./pages/401error.php');
                    return;
                }
                if (empty($_SESSION['login']) && $method == "comprar" ) {
                    header('./login');
                    return;
                }

            }
            $controller->$method();
        } catch (Error $error) {
            include_once('./pages/404error.php');
            return;
        }
    }
}
?>