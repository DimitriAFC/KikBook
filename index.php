<?php
namespace Kikbook;

// Chargement automatique des classes
require_once "vendor\autoload.php";

// début de l'application web
session_start();

$router = new Router();
// HOME CONTROLLER
$router->addRoute(new Route("/","HomeController"));
$router->addRoute(new Route("/news", "HomeController"));
// USER CONTROLLER
$router->addRoute(new Route("/register", "UserController", "register"));
$router->addRoute(new Route("/inscription", "UserController", "inscription"));
$router->addRoute(new Route("/off", "UserController"));
$router->addRoute(new Route("/account", "UserController"));
$router->addRoute(new Route("/connexion", "UserController", "connexion"));
$router->addRoute(new Route("/password", "UserController"));
$router->addRoute(new Route("/updateProfil", "UserController", "updateProfil"));
$router->addRoute(new Route("/updatePassword", "UserController", "updatePassword"));
// $router->addRoute(new Route("/profil","UserController", "getAllUsers"));
// PROFIL CONTROLLER
$router->addRoute(new Route("/profil", "ProfilController", "profil"));
$router->addRoute(new Route("/publication_profil", "ProfilController", "publication_profil"));
// FRIEND CONTROLLER
$router->addRoute(new Route("/addFriend/{*}", "UserController", "addFriend"));





$route = $router->findRoute();

if($route){
    $route->execute();
}else{
    echo "Page Not Found";
}