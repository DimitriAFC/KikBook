<?php

namespace Kikbook\model;

use Kikbook\model\databaseConnexion;
use PDO;

class News { 

     // Chercher tout les articles de la table article
    public static function getAllNews(){
    $dbh = databaseConnexion::open();
    $query = "SELECT * FROM `article` ORDER BY id_article DESC LIMIT 20;";
    $sth = $dbh->prepare($query);
    $sth -> execute();
    $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\News");
    $items = $sth->fetchAll();
    databaseConnexion::close();
    return $items;
        }

    }
    