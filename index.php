<?php
namespace Kikbook;

// Chargement automatique des classes
require_once "vendor\autoload.php";

// début de l'application web
session_start();

$router = new Router();
$router->addRoute(new Route("/","HomeController"));
$router->addRoute(new Route("/register", "UserController", "register"));
$router->addRoute(new Route("/registerBDD", "UserController"));


$route = $router->findRoute();

if($route){
    $route->execute();
}else{
    echo "Page Not Found";
}