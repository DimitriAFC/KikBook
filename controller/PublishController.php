<?php
namespace Kikbook\controller;

use Kikbook\Route;
use Kikbook\Router;
use Kikbook\View;
use Kikbook\model\Publish;

class PublishController
{
    public static function route()
    {
        $router = new Router();
        $router->addRoute(new Route("/publication_profil", "PublishController", "publication_profil"));
        $router->addRoute(new Route("/getPublicationUser", "PublishController", "getPublicationUser"));



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
            $publish = new Publish;
            $publish->id_user = $_SESSION['user']->id_user;
            $publish->contenu = $_POST['messagePublication'];
            Publish::publier($publish);

            $_SESSION['succes'] = "Message posté avec succès !";
            $router = new Router();
            $path = $router->getBasePath();
            header("location:{$path}/profil");
        }
     }

     public static function getPublicationUser(){
        $publications = Publish::getAllPublish();
        View::setTemplate('profil');
        View::bindVariable("publications", $publications);
        View::display();
    }
}

