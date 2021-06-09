<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>



    <div class="container-fluid">
        <div class="row">
            <!--------------->
            <!-- COLONNE 1 -->
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
                </div>
            </div>
            <!--------------->
            <!-- COLONNE 2 -->
            <!--------------->
            <div class="col-md-7">
            <div class="jumbotron">
                
            <?php var_dump($items)?>
            


            <!-- <?php foreach($publications as $publication):?>
            <tr>
                <th scope="row"><?= $publication->contenu ?></th>
                <?php endforeach;?> -->
                
</div>
            </div>
            <!--------------->
            <!-- COLONNE 3 -->
            <!--------------->
            <div class="col-md-3">
            <div class="jumbotron">
                    <h1 class="display-4 effet-degrade text-center" style="font-size:35px;">Quoi de neuf <?= $_SESSION['user']->prenom ?> ?</h1>
                    <?php if(isset($_SESSION['erreur'])){ ?>
                    <div class="alert alert-warning">
                        <?= $_SESSION['erreur'] ?>
                    </div>
                    <?php } unset($_SESSION['erreur']); ?>
                    <?php if(isset($_SESSION['succes'])){ ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['succes'] ?>
                    </div>
                    <?php } unset($_SESSION['succes'])?>
                </div>
                <form action="<?= $path ?>/publication_profil" method="POST" class="formulaire_connection"
                    style="margin-bottom:120px;">
                    <div class="form-group">
                        <textarea class="form-control" id="messagePublication" name="messagePublication" rows="3"
                            maxlength="255"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-connecter-accueil">Publier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>