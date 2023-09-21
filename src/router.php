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
        

        $url = explode("/", URL);
        $this->controller = !empty($url[1]) ? $url[1] : "pages";
        $this->method = !empty($url[2]) ? $url[2] : "home";
        $this->controller = $this->controller . "Controller";
        require_once(__DIR__ . "\controlers/" . $this->controller . ".php");
    }

    public function run()
    {

        $controller = new $this->controller();
        $method = $this->method;
        if ($method !== 'login') {
            include_once('./controlers/signin.php');
            if(empty($_SESSION['login']) && $method === "profile" ) {
                echo "prohibido";
            }
        }
        $controller->$method();
    }
}
?>