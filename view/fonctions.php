<?php

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