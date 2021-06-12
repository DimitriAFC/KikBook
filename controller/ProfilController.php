<?php
namespace Kikbook\controller;

use Kikbook\Route;
use Kikbook\Router;
use Kikbook\View;
use Kikbook\model\Profil;
use Kikbook\model\User;

class ProfilController 
{
    public static function route()
    {
        $router = new Router();
        $router->addRoute(new Route("/publication_profil", "ProfilController", "publication_profil"));
        $router->addRoute(new Route("/getPublicationUser", "ProfilController", "getPublicationUser"));

        $route = $router->findRoute();
        if ($route)
        {
            $route->execute();
        }
        else
        {
            echo "Page Not Found";
        }
    }

     // Fonction publication de l'utilisateur
     public static function publication_profil()
     {
        if (empty($_POST['messagePublication']))
        {
            $_SESSION['erreur'] = "Votre message est vide";
            $router = new Router();
            $path = $router->getBasePath();
            header("location:{$path}/profil");
        } else {
            $publish = new Profil;
            $publish->id_user = $_SESSION['user']->id_user;
            $publish->contenu = $_POST['messagePublication'];
            Profil::publier($publish);

            $_SESSION['succes'] = "Message posté avec succès !";
            $router = new Router();
            $path = $router->getBasePath();
            header("location:{$path}/profil");
        }
     }

     // Fonction chercher les publication de l'utilisateur
     public static function profil(){
        $id_user =  $_SESSION['user']->id_user;
        $publications = Profil::getAllPublish($id_user);
        $users = User::getAllUser();

      
        View::setTemplate('profil');
        View::bindVariable("users", $users);
        View::bindVariable("publications", $publications);
        View::display();
    }
}

