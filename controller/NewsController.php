<?php
namespace Kikbook\controller;

use Kikbook\Route;
use Kikbook\Router;
use Kikbook\View;
use Kikbook\model\News;

class NewsController{

    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/news", "NewsController", "news"));
        $router->addRoute(new Route("/getAllNews", "NewsController", "getAllNews"));

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

    function redirection(){
        if($_SESSION['user']){
            $router = new Router();
            $path = $router->getBasePath();
            header("location:{$path}/profil");
            return;
        } else {
            $router = new Router();
            $path = $router->getBasePath();
            header("location:{$path}/");
            return;
        }
    }

    public static function news(){
    $news = News::getAllNews(); 
    View::setTemplate('news');
    View::bindVariable("news", $news);
    View::display();
    }
}

