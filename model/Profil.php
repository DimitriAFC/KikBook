<?php

namespace Kikbook\model;

use Kikbook\model\databaseConnexion;
use PDO;

class Profil {
    public $id_publication;
    public $id_user;
    public $contenu;
    public $date_publication;

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

    public static function getAllPublish($id_user){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `publication` WHERE `id_user` = :id_user";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id_user", $id_user);
        $sth -> execute(array(
            'id_user' => $id_user));
        $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\Profil");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
        }
}