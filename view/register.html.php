<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar-off.html" ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <img src="public/images/kikbook-nom.png" class="rounded mx-auto d-block" alt="kikbook-logo"
                    style="width:300px; height:100px;">
                <a href="<?= $path ?>/" class="btn-inscription">
                    <div class="form-row text-center">
                        <div class="col-12">
                            <button class="btn btn-primary btn-retour-accueil"> <img src="public/images/house-fill.png"
                                    width="30" height="30" class="d-inline-block align-top" alt="kikbook-logo">
                            </button>
                </a>
                <?php if(isset($_SESSION['erreur'])){ ?>
                    <div class="alert alert-warning">
                        <?= $_SESSION['erreur'] ?>
                    </div>
                <?php } unset($_SESSION['erreur']) ?>
            </div>
        </div>
        <form action="<?= $path ?>/inscription" method="POST" class="formulaire_connection"
            style="margin-bottom:120px;">
            <div class="form-group">
                <label for="nom">Votre Nom</label>
                <input type="text" class="form-control" id="nom" placeholder="Votre Nom" name="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Votre Prénom</label>
                <input type="text" class="form-control" id="prenom" placeholder="Votre Prénom" name="prenom">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="Adresse mail" name="email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
            </div>

            <div class="form-group">
                <label for="date_naissance">Date de Naissance</label>
                <input class="form-control" type="date" value="2000-08-19" id="date_naissance" name="date_naissance">
            </div>
            <div class="form-group">
                <label for="genre">Vous êtes</label>
                <select class="form-control" id="genre" name="genre">
                    <option>Homme</option>
                    <option>Femme</option>
                </select>
            </div>
            <div class="form-row text-center">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-connecter-accueil" >S'inscrire</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
    </div>
    </div>
    </div>
    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>