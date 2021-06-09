<?php

namespace Kikbook\model;

use Kikbook\model\databaseConnexion;
use PDO;

class Publish {
    public $id_publication;
    public $id_user;
    public $contenu;

    public function publier($publish){
        $publish->id_user = (int) $publish->id_user;
        $publish->contenu = (string) $publish->contenu;
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO `publication`(`id_user`, `contenu`) 
        VALUES (:id_user, :contenu);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id_user",  $publish->id_user);
        $sth->bindParam(":contenu", $publish->contenu);
        $sth->execute();
        databaseConnexion::close();
    }

    public static function getAllPublish(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `publication`;";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\Publish");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
        }

}