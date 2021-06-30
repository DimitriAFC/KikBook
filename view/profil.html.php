<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_SESSION['erreur'])){ ?>
                <div class="alert alert-warning text-center" style="margin:20px; 0px;">
                    <?= $_SESSION['erreur'] ?>
                </div>
                <?php } unset($_SESSION['erreur']); ?>
                <?php if(isset($_SESSION['succes'])){ ?>
                <div class="alert alert-success text-center" style="margin:20px; 0px;">
                    <?= $_SESSION['succes'] ?>
                </div>
                <?php } unset($_SESSION['succes'])?>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top:30px;">
        <div class="row">
            <!--------------->
            <!-- COLONNE 1 -->
            <!--------------->
            <div class="col-md-3">
                <div class="jumbotron jumbotron-fluid" style="background-color:white;">
                    <div class="container">
                        <h1 class="display-4 effet-degrade text-center" style="font-size:35px;">Mon profil</h1>
                        <p class="text-center"><?= $_SESSION['user']->nom ?> <?= $_SESSION['user']->prenom ?></p>
                        <p class="text-center"><?= $_SESSION['user']->email ?></p>
                        <p class="text-center">Inscrit depuis le : <?= $_SESSION['user']->date_inscription ?></p>
                    </div>
                </div>
            </div>
            <!--------------->
            <!-- COLONNE 2 -->
            <!--------------->
            <div class="col-md-4">
                <div class="jumbotron">
                    <h1 class="display-4 effet-degrade text-center" style="font-size:35px;">Quoi de neuf
                        <?= $_SESSION['user']->prenom ?> ?</h1>
                </div>
                <form action="<?= $path ?>/publication_profil" method="POST" class="formulaire_connection" style="">
                    <div class="form-group">
                        <input class="form-control" id="messagePublication" name="messagePublication" rows="3"
                            maxlength="255">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-connecter-accueil">Publier</button>
                    </div>
                </form>
                <div class="jumbotron" style="">

                    <?php foreach($publications as $publication):?>
                    <div class="alert alert-primary" role="alert">
                        <p><?= $_SESSION['user']->prenom ?> <?= $_SESSION['user']->nom ?> publication du :
                            <?= $publication->date_publication ?></p>
                        <p><?= $publication->contenu ?></p>
                        <p>
                            <form action="<?= $path ?>/publication_commentaire" method="POST" class="">
                                <div class="form-group">
                                <div class="row">
                                <div class="col-md-10">
                                    <input class="form-control" id="messagePublication" name="messagePublication"
                                        placeholder="Laisser un commentaire" maxlength="255">
                                        </div>
                                        <div class="col-md-2">
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Publier</button>
                                        </div>
                                        </div>
                                        </div>
                                </div>
                                
                            </form>
                        </p>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <!--------------->
            <!-- COLONNE 3 -->
            <!--------------->
            <div class="col-md-3">
                <div class="jumbotron jumbotron-fluid"
                    style="background-color:white; padding-bottom:20px; margin-bottom:20px;">
                    <div class="container">
                        <h1 class="display-4 effet-degrade text-center" style="font-size:35px;">Mes amis</h1>
                        <?php foreach($infos as $info):?>
                        <?php if($info->acceptation == 1){
                            if($_SESSION['user']->id_user == $info->id_demandeur){
                                    echo" <div class='alert alert-primary' role='alert'>
                                    <p>Amis avec: " .$info->id_repondant. "</p> 
                                    <p>Depuis le: " .$info->date_ajout. "</p>
                                    </div>";
                                }
                                if($_SESSION['user']->id_user == $info->id_repondant){
                                    echo" <div class='alert alert-primary' role='alert'>
                                    <p>Amis avec: " .$info->id_demandeur. "</p> 
                                    <p>Depuis le: " .$info->date_ajout. "</p>
                                    </div>";
                                }
                                }
                                else{
                                 echo"<div style='display:none;'></div>";
                                } ?>
                        <?php endforeach;?>
                        
                    </div>
                </div>
                <div class="jumbotron jumbotron-fluid" style="background-color:white; padding-bottom:20px;">
                    <div class="container">
                        <h1 class="display-4 effet-degrade text-center" style="font-size:35px;">Rechercher des amis</h1>
                        <?php foreach($users as $user):?>
                        <?php if($user->id_user === $_SESSION['user']->id_user){
                            echo"<div style='display:none;'></div>";
                                }else {
                                        echo"<div class='col text-center'>
                                        <div class='alert alert-primary' role='alert'>
                                        <div class='row'>
                                        <div class='col-md-8'>" .$user->nom. ' ' .$user->prenom. "</div>
                                        <div class='col-md-4'> <a class='btn btn-success' href='$path/addFriends/$user->id_user'>Demander</a></div>
                                        </div>
                                        </div>
                                        </div>"
                                                ;} ?>
                        <?php endforeach;?>

                    </div>
                </div>


            </div>

            <!--------------->
            <!-- COLONNE 4 -->
            <!--------------->
            <div class="col-md-2">

                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active">
                        Paramètres
                    </button>
                    <button type="button" class="list-group-item list-group-item-action"><a
                            href="<?= $path ?>/account">Modifier mes
                            informations</a></button>
                    <button type="button" class="list-group-item list-group-item-action"><a
                            href="<?= $path ?>/password">Modifier mon mot de
                            passe</a></button>
                    <button type="button" class="list-group-item list-group-item-action"><a
                            href="<?= $path ?>/friends">Ma
                            liste
                            d'amis</a></button>
                    <button type="button" class="list-group-item list-group-item-action"><a
                            href="<?= $path ?>/requestfriends">Mes demandes d'amis
                            d'amis</a></button>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>