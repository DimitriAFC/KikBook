<?php
namespace Kikbook;

// Chargement automatique des classes
require_once "vendor\autoload.php";

// début de l'application web
session_start();

$router = new Router();
$router->addRoute(new Route("/","HomeController"));
$router->addRoute(new Route("/register", "UserController", "inscription"));
$router->addRoute(new Route("/profil", "UserController"));
$router->addRoute(new Route("/off", "UserController"));
$router->addRoute(new Route("/connexion", "UserController", "connexion"));



$route = $router->findRoute();

if($route){
    $route->execute();
}else{
    echo "Page Not Found";
}