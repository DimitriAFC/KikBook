<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <img src="public/images/kikbook-logo.png" class="rounded mx-auto d-block logo-accueil"
                    alt="kikbook-logo">
                    <button class="btn btn-primary btn-retour-accueil"><a href="<?= $path ?>/"
                        class="btn-inscription">Acceuil</a></button>
                <form action="" method="POST" class="formulaire_connection">
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
                        <input type="password" class="form-control" id="password" placeholder="Mot de passe"
                            name="password">
                    </div>

                    <div class="form-group">
                        <label for="date-naissance">Date de Naissance</label>
                        <input class="form-control" type="date" value="2000-08-19" id="date-naissance"
                            name="date-naissance">
                    </div>
                    <div class="form-group">
                        <label for="genre">Vous êtes</label>
                        <select class="form-control" id="genre" name="genre">
                            <option>Un homme</option>
                            <option>Une femme</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-inscrire">S'inscrire</button>
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