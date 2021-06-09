<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar-off.html" ?>
    <div class="container-fluid" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <p class="text-center texte-accueil">Rester en contact avec vos collègues de travail, partagez vos avis
                    et discuter en toute simplicité autout d'un bon café.</p>
                    <?php if(isset($_SESSION['succes'])){ ?>
                <div class="alert alert-success text-center">
                    <?= $_SESSION['succes'] ?>
                </div>
                <?php } unset($_SESSION['succes']) ?>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
    <div class="container-xl" style="margin-top:30px;">
        <div class="row">
            <div class="col-sm-6">
                <img src="public/images/phone.png" class="rounded mx-auto d-block logo-accueil image-presentation"
                    alt="kikbook-logo" style="height:550px; width:470px;">
            </div>
            <div class="col-sm-4">
                <h1 class="text-center nom-accueil effet-degrade"> KIKBOOK </h1>
                <?php if(isset($_SESSION['erreur'])){ ?>
                <div class="alert alert-warning">
                    <?= $_SESSION['erreur'] ?>
                </div>
                <?php } unset($_SESSION['erreur']) ?>
                <form action="<?= $path ?>/connexion" method="Post" class="formulaire_connection">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Adresse mail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Mot de passe"
                            name="password">
                    </div>
                    <div class="text-center" style="margin-top:10px;">

                        <a href="<?= $path ?>/forget" class="mot-de-passe-oublier">Mot de passe oublié ?</a>
                    </div>
                    <div class="form-row text-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-connecter-accueil">Se connecter</button>
                        </div>
                    </div>
                </form>
                <a href="<?= $path ?>/register" class="btn-inscription">
                    <button class="btn btn-primary btn-inscription-accueil">S'inscrire</button></a>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div>
    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>