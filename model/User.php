<?php

namespace Kikbook\model;

use Kikbook\model\databaseConnexion;
use PDO;

class User {

    // Inscription au site
    public function register(){
    $dbh = databaseConnexion::open();
    $query = "INSERT INTO `user`(`nom`, `prenom`, `email`, `password`, `date_naissance`, `genre`) 
    VALUES (:nom, :prenom, :email, :password, :date_naissance, :genre);";
    $sth = $dbh->prepare($query);
    $sth->bindParam(":nom", $this->nom);
    $sth->bindParam(":prenom", $this->prenom);
    $sth->bindParam(":email", $this->email);
    $sth->bindParam(":password", $this->password);
    $sth->bindParam(":date_naissance", $this->date_naissance);
    $sth->bindParam(":genre", $this->genre);
    $sth->execute();
    databaseConnexion::close();
    }

    // Connexion au site
    public static function connexion(string $email){
    $dbh = databaseConnexion::open();
    $query = "SELECT * FROM `user` WHERE `email` = :email";
    $sth = $dbh->prepare($query);
    $sth->bindParam(":email", $email);
    $sth->execute();
    $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\User");
    $items = $sth->fetch();
    databaseConnexion::close();
    return $items;
    }

    // Modification du profil utilisateur
    public function updateProfil(){
    $dbh = databaseConnexion::open();
    $query = "UPDATE `user` SET nom= :nom, prenom= :prenom, email= :email, date_naissance= :date_naissance, genre= :genre WHERE id_user = :id_user";
    $sth = $dbh->prepare($query);
    $sth->bindParam(":nom", $this->nom);
    $sth->bindParam(":prenom", $this->prenom);
    $sth->bindParam(":email", $this->email);
    $sth->bindParam(":date_naissance", $this->date_naissance);
    $sth->bindParam(":genre", $this->genre);
    $sth->bindParam(":id_user", $this->id_user);
    $sth->execute();
    databaseConnexion::Close();  
    }

    // Modification du mot de passe 
    public function updatePassword(){
    $dbh = databaseConnexion::open();
    $query = "UPDATE `user` SET password= :password WHERE id_user = :id_user";
    $sth = $dbh->prepare($query);
    $sth->bindParam(":password", $this->password);
    $sth->bindParam(":id_user", $this->id_user);
    $sth->execute();
    databaseConnexion::Close();  
    }

    // Chercher tout les utilisateur de la table user, aléatoire , limite de 5
    public static function getAllUser(){
    $dbh = databaseConnexion::open();
    $query = "SELECT * FROM `user` ORDER BY rand() LIMIT 20;";
    $sth = $dbh->prepare($query);
    $sth -> execute();
    $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\User");
    $items = $sth->fetchAll();
    databaseConnexion::close();
    return $items;
    }

    // SELECT * FROM `user` WHERE NOT EXISTS (SELECT id_repondant FROM friend WHERE id_user=id_demandeur)

    // Voir le profil de l'utilisateur sélectionner dans la liste d'amis
    public static function getUserProfil($id_user){
    $dbh = databaseConnexion::open();
    $query = "SELECT * FROM `user` WHERE `id_user` = :id_user;";
    $sth = $dbh->prepare($query);
    $sth->bindParam(":id_user",$id_user);
    $sth -> execute(array(
        'id_user' => $id_user));
    $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\User");
    $items = $sth->fetchAll();
    databaseConnexion::close();
    return $items;
    }


}