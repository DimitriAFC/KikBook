<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="margin-top:30px;">
                    <button type="submit" class="btn btn-primary"><a href="<?= $path ?>/profil">Retour au
                            profil</a></button>
                    <div class="alert alert-dark text-center" role="alert">
                        Modifier mon profil
                    </div>
                    <form action="<?= $path ?>/updateProfil" method="Post" class="formulaire_inscription">
                        <div class="form-group">
                            <label for="nom">Votre Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Votre Nom" name="nom"
                                value="<?= $_SESSION['user']->nom ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Votre Prénom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Votre Prénom" name="prenom"
                                value="<?= $_SESSION['user']->prenom ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="Adresse mail" name="email"
                                value="<?= $_SESSION['user']->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_naissance">Date de Naissance</label>
                            <input class="form-control" type="date" id="date_naissance" name="date_naissance"
                                value="<?= $_SESSION['user']->date_naissance ?>">
                        </div>
                        <div class="form-group">
                            <label for="genre">Vous êtes</label>
                            <select class="form-control" id="genre" name="genre">
                                <option>Homme</option>
                                <option>Femme</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-inscrire">Mettre à jour</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>