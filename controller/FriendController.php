<?php
namespace Kikbook\controller;

use Kikbook\Route;
use Kikbook\Router;
use Kikbook\View;
use Kikbook\model\Friend;


class FriendController 
{
    public static function route()
    {
        $router = new Router();
        $router->addRoute(new Route("/addFriend/{id}", "FriendController", "addFriend"));


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

   
   
}


