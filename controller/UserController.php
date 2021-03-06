<?php
namespace Kikbook\controller;

use Kikbook\Route;
use Kikbook\Router;
use Kikbook\View;
use Kikbook\model\User;
use Kikbook\model\Profil;

class UserController
{
    public static function route()
    {
        $router = new Router();
        $router->addRoute(new Route("/register", "UserController", "register"));
        $router->addRoute(new Route("/inscription", "UserController", "inscription"));
        $router->addRoute(new Route("/profil", "UserController", "profil"));
        $router->addRoute(new Route("/off", "UserController", "off"));
        $router->addRoute(new Route("/connexion", "UserController", "connexion"));
        $router->addRoute(new Route("/password", "UserController", "password"));
        $router->addRoute(new Route("/account", "UserController", "account"));
        $router->addRoute(new Route("/updateProfil", "UserController", "updateProfil"));
        $router->addRoute(new Route("/updatePassword", "UserController", "updatePassword"));
        $router->addRoute(new Route("/getAllUser", "UserController", "getAllUser"));
        $router->addRoute(new Route("/seeuser/{id}", "UserController", "seeuser"));
        $router->addRoute(new Route("/requestfriends", "UserController", "requestfriends"));
        $router->addRoute(new Route("/userlist", "UserController", "userlist"));



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

    public static function userlist(){
    $users = User::getAllUser(); 
    View::bindVariable("users", $users);
    View::setTemplate('userlist');
    View::display();
    }

    public static function register(){
        View::setTemplate('register');
        View::display();
        }

    // Fonction inscription de l'utilisateur
    public static function inscription()
    {
        if(empty($_POST['nom'])){
            $_SESSION['erreur'] = "Merci de renseigner un nom.";
            header("Location: ".$_SERVER['HTTP_REFERER']."");
        }
        else {
            if(empty($_POST['prenom'])){
                $_SESSION['erreur'] = "Merci de renseigner un pr??nom.";
                header("Location: ".$_SERVER['HTTP_REFERER']."");
            }
            else {
                if(empty($_POST['email'])){
                    $_SESSION['erreur'] = "Merci de renseigner un e-mail.";
                    header("Location: ".$_SERVER['HTTP_REFERER']."");
                }
                else {
                    if(empty($_POST['password'])){
                        $_SESSION['erreur'] = "Merci de renseigner un mot de passe.";
                        header("Location: ".$_SERVER['HTTP_REFERER']."");
                    }
                    else {
                        if(empty($_POST['date_naissance'])){
                            $_SESSION['erreur'] = "Merci de renseigner une date de naissance.";
                            header("Location: ".$_SERVER['HTTP_REFERER']."");
                        }
                        else {
                            if (empty($_POST['genre'])){
                                $_SESSION['erreur'] = "Merci de renseigner votre genre.";
                                header("Location: ".$_SERVER['HTTP_REFERER']."");
                            }
                            else {
                                $user = new User;
                                $user->nom = $_POST['nom'];
                                $user->prenom = $_POST['prenom'];
                                $user->email = $_POST['email'];
                                $hash = $_POST['password'];
                                $user->password = password_hash($hash,PASSWORD_DEFAULT);
                                $user->date_naissance = $_POST['date_naissance'];
                                $user->genre = $_POST['genre'];
                                $user->register();

                                // $loginUser = new User;
                                // $_SESSION['user'] = $loginUser->connexion($user->email, $user->password);

                                $_SESSION['succes'] = "Inscription prise en compte45 !";
                                $router = new Router();
                                $path = $router->getBasePath();
                                header("location:{$path}/");
                            }
                        }
                    }
                }
            }

        }
    }

    // Fonction connexion de l'utilisateur
    public static function connexion(){
        if (empty($_POST['email'])){
            $_SESSION['erreur'] = "Merci de renseigner un mail valide.";
            header("location:{$path}/KikBook");
        }
        else {
            if(empty($_POST['password'])){
            $_SESSION['erreur'] = "Merci de saisir un mot de passe.";
            header("location:{$path}/KikBook");
            }
            else {


                $email = $_POST['email'];
                $password = $_POST['password'];
                $users = new User;
                $user = $users->connexion($email);
                $hash = $user->password;

                if($user != null && password_verify($password, $hash)){
                    $_SESSION['user'] = $user;
                    $router = new Router();
                    $path = $router->getBasePath();
                    header("location: {$path}/profil");
                }
                else {
                    $_SESSION['erreur'] = "L'email ou le mot de passe ne sont pas valide.";
                    unset($_SESSION['user']);
                    $router = new Router();
                    $path = $router->getBasePath();
                    header("location:profil.html.php");
                }
            }
        }
    }

    public static function profil(){
    View::setTemplate('profil');
    View::display();
    }
  
    // Fonction de d??connexion de l'utilisateur
    public static function off(){
    unset($_SESSION['user']);
    $router = new Router();
    $path = $router->getBasePath();
    header("location:{$path}/");
    }

    public static function account(){
    View::setTemplate('account');
    View::display();
    }

    public static function updateProfil(){
    $user = new User;
    $user->id_user = $_SESSION['user']->id_user;
    $user->nom = $_POST['nom'];
    $user->prenom = $_POST['prenom'];
    $user->email = $_POST['email'];
    $user->password = $_SESSION['user']->password;
    $user->date_naissance = $_POST['date_naissance'];
    $user->genre = $_POST['genre'];
    $user->updateProfil();

    $loginUser = new User;

    $_SESSION['user'] = $loginUser->connexion($user->email, $user->password);
    $_SESSION['succes'] = "Profil mise ?? jour !";
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    }

    public static function updatePassword(){
    if($_POST['password'] === $_POST['newPassword'])
        {
        $user = new User;
        $hash = $_POST['password'];
        $user->id_user = $_SESSION['user']->id_user;
        $user->email = $_SESSION['user']->email;
        $user->password = password_hash($hash,PASSWORD_DEFAULT);
        $user->updatePassword();
        $loginUser = new User;

        $_SESSION['user'] = $loginUser->connexion($user->email, $user->password);
        $_SESSION['succes'] = "Mot de passe mise ?? jour !";
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        }
    else{
        $_SESSION['erreur'] = "Les mots de passe ne sont pas identique !";
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        }
    }

    public static function seeuser($id){
    $users = User::getUserProfil($id);
    $id_user = $id;
    $elements = Profil::getAllInfosUsers($id_user);
    $commentaires = Profil::getAllCommentaire();
    $friends = Profil::listeFriend();
    View::bindVariable("users", $users);
    View::bindVariable("id_user", $id_user);
    View::bindVariable("elements", $elements);
    View::bindVariable("commentaires", $commentaires);
    View::bindVariable("friends", $friends);
    View::setTemplate('seeuser');
    View::display();
    }

    public static function requestfriends(){
    $id_repondant = $_SESSION['user']->id_user;
    $requests = Profil::friendRequest($id_repondant);
    View::bindVariable("id_repondant", $id_repondant);
    View::bindVariable("requests", $requests);
    View::setTemplate('requestfriends');
    View::display();
    }

    public static function password(){
    View::setTemplate('password');
    View::display();
    }
    }

