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

   
}
