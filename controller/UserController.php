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
        $router->addRoute(new Route("/register", "UserController", "inscription"));
        $router->addRoute(new Route("/profil", "UserController", "profil"));
        $router->addRoute(new Route("/off", "UserController", "off"));
        $router->addRoute(new Route("/connexion", "UserController", "connexion"));


        $route = $router->findRoute();
        if ($route) {
            $route->execute();
        } else {
            echo "Page Not Found";
        }
    }

    // Fonction inscription de l'utilisateur
    public static function inscription()
    {
        View::setTemplate('register');
        View::display();
        
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

    // Fonction connexion de l'utilisateur
     public static function connexion()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $users = new User;

        $user = $users->connexion($email, $password);

        if ($user != null) {
            $_SESSION['user'] = $user;
            $router = new Router();
            $path =  $router->getBasePath();
            header("location: {$path}/profil");
        } else {
                unset($_SESSION['user']);
                $router = new Router();
                $path = $router->getBasePath();
                header("location:{$path}/");
            }
        }

    public static function profil()
    {
        View::setTemplate('profil');
        View::display();
    }

    // Fonction de déconnexion de l'utilisateur
    public static function off()
    {
        unset($_SESSION['user']);

        $router = new Router();
        $path = $router->getBasePath();
        header("location:{$path}/");
    }

    }



