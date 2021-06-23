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
        $router->addRoute(new Route("/friends", "ProfilController", "friends"));
        $router->addRoute(new Route("/requestfriends", "ProfilController", "requestfriends"));
        $router->addRoute(new Route("/addFriends/{id}", "ProfilController", "addFriends"));
        $router->addRoute(new Route("/suppFriends/{id}", "ProfilController", "suppFriends"));




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
        $infos = Profil::getFriendInfos();

        if(isset($_SESSION['user'])){
        View::setTemplate('profil');
        View::bindVariable("users", $users);
        View::bindVariable("publications", $publications);
        View::bindVariable("infos", $infos);
        View::display();
        }else {
            $router = new Router();
            $path = $router->getBasePath();
            header("location: {$path}/");
        }
    }

    public static function friends()
    {
        if(isset($_SESSION['user'])){
                $id_user =  $_SESSION['user']->id_user;
                $infos = Profil::getFriendInfos();
                View::setTemplate('friends');
                View::bindVariable("infos", $infos);
                View::display();
                
        } else{
                $router = new Router();
                $path = $router->getBasePath();
                header("location: {$path}/");
              }
    }

    public static function requestfriends()
    {
        if(isset($_SESSION['user'])){
            View::setTemplate('requestfriends');
            View::display();
            }else {
                $router = new Router();
                $path = $router->getBasePath();
                header("location: {$path}/");
            }
    }

    public static function addFriends($id){
        $id_repondant = $id;
        $id_demandeur = $_SESSION['user']->id_user;
        $acceptation = 0;
        Profil::addFriends($id_demandeur,$id_repondant,$acceptation);
        $_SESSION['succes'] = "Votre demande à été envoyé !";
        $router = new Router();
        $path = $router->getBasePath();
        header("location:{$path}/profil");
    }

    public static function suppFriends($id){
        $id_relation = $id;
        Profil::suppFriends();
        View::bindVariable("id_relation", $id_relation);
        $_SESSION['succes'] = "Amis retiré de votre liste !";
        $router = new Router();
        $path = $router->getBasePath();
        header("location:{$path}/friends");
    }
}

