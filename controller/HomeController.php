<?php
namespace Kikbook\controller;

use Kikbook\Route;
use Kikbook\Router;
use Kikbook\View;

class HomeController
{

    public static function route()
    {
        $router = new Router();
        $router->addRoute(new Route("/", "HomeController", "home"));
        $router->addRoute(new Route("/news", "HomeController", "news"));

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

    public static function home()
    {
        if(isset($_SESSION['user'])){
            $router = new Router();
            $path = $router->getBasePath();
            header("location: {$path}/profil");
        }
        else{
        View::setTemplate('home');
        View::display();
    }
    }

    public static function news()
    {
        if(isset($_SESSION['user'])){
            View::setTemplate('news');
            View::display();
            }else {
                $router = new Router();
                $path = $router->getBasePath();
                header("location: {$path}/");
            }
    }
}

