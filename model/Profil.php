<?php

namespace Kikbook\model;

use Kikbook\model\databaseConnexion;
use PDO;

class Profil {

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

        public static function getFriendInfos(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `friend`;";
        $sth = $dbh->prepare($query);
        $sth -> execute();
        $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\Profil");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
         }


        public function addFriends($id_demandeur, $id_repondant, $acceptation){
        $id_demandeur = (int) $id_demandeur;
        $id_repondant = (int) $id_repondant;
        $acceptation = (int) $acceptation;
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO `friend`(`id_demandeur`, `id_repondant`, `acceptation`) 
        VALUES (:id_demandeur, :id_repondant, :acceptation);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id_demandeur", $id_demandeur);
        $sth->bindParam(":id_repondant", $id_repondant);
        $sth->bindParam(":acceptation", $acceptation);
        $sth->execute();
        databaseConnexion::close();
        }

        public static function suppFriends($id_relation){
        $dbh = databaseConnexion::open();
        $query = "DELETE FROM `friend` WHERE id_relation = :id_relation;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id_relation",$id_relation);
        $sth -> execute();
        databaseConnexion::close();  
        }
}