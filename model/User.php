<?php

namespace Kikbook\model;

use Kikbook\model\databaseConnexion;
use PDO;

class User {
    public $id_user;
    public $nom;
    public $prenom;
    public $email;
    public $password;
    public $date_naissance;
    public $genre;
    public $role;

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

    public static function connexion(string $email, string $password){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM `user` WHERE `email` = :email AND `password` = :password ";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":email", $email);
        $sth->bindParam(":password", $password);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS,"Kikbook\\model\\User");
        $items = $sth->fetch();
        databaseConnexion::close();
        return $items;
    }

    public function updateProfil()
    {
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

    public function updatePassword()
    {
        $dbh = databaseConnexion::open();
        $query = "UPDATE `user` SET password= :password WHERE id_user = :id_user";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":password", $this->password);
        $sth->bindParam(":id_user", $this->id_user);
        $sth->execute();
        databaseConnexion::Close();  
    }

}