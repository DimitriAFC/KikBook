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
        $router->addRoute(new Route("/addFriends/{id}", "ProfilController", "addFriends"));
        $router->addRoute(new Route("/suppFriends/{id}", "ProfilController", "suppFriends"));
        $router->addRoute(new Route("/acceptFriends/{id}", "ProfilController", "acceptFriends"));
        $router->addRoute(new Route("/deletePublish/{id}", "ProfilController", "deletePublish"));
        $router->addRoute(new Route("/updatePublish/{id}", "ProfilController", "updatePublish"));
        $router->addRoute(new Route("/insertCommentaire/{id}", "ProfilController", "insertCommentaire"));
        $router->addRoute(new Route("/insertCommentaireProfil/{id}", "ProfilController", "insertCommentaireProfil"));
        $router->addRoute(new Route("/deleteCommentaire/{id}", "ProfilController", "deleteCommentaire"));     
        

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
     public static function publication_profil(){
        if (empty($_POST['messagePublication'])){
            $_SESSION['erreur'] = "Votre message est vide";
            header("Location: ".$_SERVER['HTTP_REFERER']."");
        } else {
            $publish = new Profil;
            $publish->id_user = $_SESSION['user']->id_user;
            $publish->contenu = $_POST['messagePublication'];
            Profil::publier($publish);

            $_SESSION['succes'] = "Message posté avec succès !";
            header("Location: ".$_SERVER['HTTP_REFERER']."");
        }
     }

    // Fonction chercher les publication de l'utilisateur
    public static function profil(){
    $id_user =  $_SESSION['user']->id_user;
    $id_repondant = $_SESSION['user']->id_user;
    $publications = Profil::getAllPublish($id_user);
    $infos = Profil::getFriendInfosRepondant();
    $informations = Profil::getFriendInfosDemandeur();
    $commentaires = Profil::getAllCommentaire();
    $friends = Profil::listeFriend();
    $numbers = Profil::numberFriend($id_repondant);

    View::setTemplate('profil');
    View::bindVariable("publications", $publications);
    View::bindVariable("infos", $infos);
    View::bindVariable("informations", $informations);
    View::bindVariable("commentaires", $commentaires);
    View::bindVariable("friends", $friends);
    View::bindVariable("numbers", $numbers);
    View::display();
    }

    public static function friends(){
    $id_user =  $_SESSION['user']->id_user;
    $infos = Profil::getFriendInfosRepondant();
    $informations = Profil::getFriendInfosDemandeur();
    View::setTemplate('friends');
    View::bindVariable("infos", $infos);
    View::bindVariable("informations", $informations);
    View::display();
    }

    public static function addFriends($id){
    $id_repondant = $id;
    $id_demandeur = $_SESSION['user']->id_user;
    $acceptation = 0;
    Profil::addFriends($id_demandeur,$id_repondant,$acceptation);
    View::bindVariable("id_repondant", $id_repondant);
    View::bindVariable("id_demandeur", $id_demandeur);
    View::bindVariable("acceptation", $acceptation);
    $_SESSION['succes'] = "Votre demande à été envoyé !";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    }

    public static function acceptFriends($id){
    $id_repondant = $_SESSION['user']->id_user;
    $id_relation = $id;
    Profil::acceptFriends($id_repondant, $id_relation);
    View::bindVariable("id_repondant", $id_repondant);
    $_SESSION['succes'] = "Invitation accepté !";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    }

    public static function suppFriends($id){
    $id_relation = $id;
    Profil::suppFriends($id);
    View::bindVariable("id_relation", $id_relation);
    $_SESSION['succes'] = "Amis retiré de votre liste !";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    }

    public static function deletePublish($id_publication){
    Profil::deletePublish($id_publication);
    $_SESSION['succes'] = "Publication supprimé !";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    }

    public static function updatePublish($id_publication){ 
    $contenu = $_POST['messageModifier'];
    Profil::updatePublish($id_publication, $contenu);
    $_SESSION['succes'] = "Publication modifié !";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    }

    public static function insertCommentaire($id){
    $contenu = $_POST['commentaire'];
    $id_user = $_SESSION['user']->id_user;
    $id_publication = $id;
    Profil::insertCommentaire($contenu,$id_user,$id_publication);
    $_SESSION['succes'] = "Commentaire ajouté avec succès !";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    }

    public static function insertCommentaireProfil($id){
    $contenu = $_POST['commentaire'];
    $id_user = $_SESSION['user']->id_user;
    $id_publication = $id;
    $id_utilisateur = Profil::infosUtilisateurs($id_publication);  

    if(empty($_POST['commentaire'])){
    $_SESSION['erreur'] = "Votre message est vide";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    } else {
    Profil::insertCommentaire($contenu,$id_user,$id_publication);
    $_SESSION['succes'] = "Commentaire ajouté avec succès !";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
    }

    public static function deleteCommentaire($id_commentaire){
    Profil::deleteCommentaire($id_commentaire);
    $_SESSION['succes'] = "Commentaire supprimé !";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
}

