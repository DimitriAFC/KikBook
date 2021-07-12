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
        $query = "SELECT * FROM `publication` WHERE `id_user` = :id_user ORDER BY id_publication DESC";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id_user", $id_user);
        $sth -> execute(array(
            'id_user' => $id_user));
        $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\Profil");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
        }

    public static function deletePublish($id_publication){
        $dbh = databaseConnexion::open();
        $query = "DELETE FROM `publication` WHERE id_publication = :id_publication;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id_publication",$id_publication);
        $sth -> execute();
        databaseConnexion::close();  
        }

    public static function updatePublish($id_publication, $contenu){
        $id_publication = (int)$id_publication;
        $dbh = databaseConnexion::open();
        $query = "UPDATE `publication` SET `contenu`= '$contenu' WHERE `id_publication` = $id_publication ;";
        $sth = $dbh->prepare($query);
        $sth -> execute();
        databaseConnexion::close();
        }


        public static function getFriendInfosRepondant(){
        $dbh = databaseConnexion::open();
        $query = "SELECT b.id_user, b.nom, b.prenom, a.date_ajout, a.acceptation, a.id_demandeur, a.id_repondant, a.id_relation FROM friend as a JOIN user as b ON (b.id_user = a.id_repondant) ORDER BY rand() LIMIT 5;";
        $sth = $dbh->prepare($query);
        $sth -> execute();
        $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\Profil");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
             }

        public static function getFriendInfosDemandeur(){
        $dbh = databaseConnexion::open();
        $query = "SELECT b.id_user, b.nom, b.prenom, a.date_ajout, a.acceptation, a.id_demandeur, a.id_repondant, a.id_relation FROM friend as a JOIN user as b ON (b.id_user = a.id_demandeur) ORDER BY rand() LIMIT 5;";
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

        public static function friendRequest(){
            $dbh = databaseConnexion::open();
            $query = "SELECT a.id_relation, a.date_ajout, a.id_demandeur, a.id_repondant, a.acceptation, b.id_user, b.nom, b.prenom, b.email, b.date_naissance, b.genre, b.date_inscription
            FROM friend AS a JOIN user AS b ON (a.id_demandeur = b.id_user);";
            $sth = $dbh->prepare($query);
            $sth->bindParam(":id_repondant", $id_repondant);
            $sth->execute(array(
                'id_repondant' => $id_repondant));
            $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\Profil");
            $items = $sth->fetchAll();
            databaseConnexion::close();
            return $items;
        }

        public static function  acceptFriends($id_repondant){
            $dbh = databaseConnexion::open();
            $query = "UPDATE `friend` SET`acceptation`= 1 WHERE `id_repondant` = :id_repondant ";
            $sth = $dbh->prepare($query);
            $sth->bindParam(":id_repondant", $id_repondant);
            $sth->execute(array(
                'id_repondant' => $id_repondant));
            $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\Profil");
            $items = $sth->fetchAll();
            databaseConnexion::close();
            return $items;
        }

        public static function getAllInfosUsers($id_user){
            $dbh = databaseConnexion::open();
            $query = "SELECT a.id_user, a.nom, a.prenom, a.email, a.date_naissance, a.genre, a.date_inscription, b.contenu, b.date_publication
            FROM user AS a 
            JOIN publication AS b
            WHERE (a.id_user = b.id_user);";
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