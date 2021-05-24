<?php

namespace Kikbook\controller;

use Kikbook\Route;
use Kikbook\Router;
use Kikbook\View;
use Kikbook\model\User;


class UserController
{
    public static function route()
    {
        $router = new Router();
        $router->addRoute(new Route("/register", "UserController", "register"));
        $router->addRoute(new Route("/registerBDD", "UserController", "inscription"));

        $route = $router->findRoute();
        if ($route) {
            $route->execute();
        } else {
            echo "Page Not Found";
        }
    }

    public static function register()
    {
        View::setTemplate('register');
        View::display();
    }

    public static function inscription()
    {
        $user = new User;
        $user->nom = $_POST['nom'];
        $user->prenom = $_POST['prenom'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->date_naissance = $_POST['date_naissance'];
        $user->genre = $_POST['genre'];
        $user->register();

        $loginUser = new User;
        $_SESSION['user'] = $loginUser->connexion($user->email, $user->password);

        $router = new Router();
        $path =  $router->getBasePath();
        header("location: {$path}/");
    }
   
}
