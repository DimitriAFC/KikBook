<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <div class="container-fluid" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <h1 class="text-center">Bienvenue sur KikBook</h1>
                <p class="text-center">KikBook est un site intranet pour les enrtreprises. <br>
                    Retrouvez vos collègues de travail, partagez et discuter autour d'un bon café.</p>
                <img src="public/images/kikbook-logo.png" class="rounded mx-auto d-block logo-accueil"
                    alt="kikbook-logo">
                <form action="" method="POST" class="formulaire_connection">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Adresse mail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Mot de passe"
                            name="password">
                    </div>
                    <a href="<?= $path ?>/forget" class="mot-de-passe-oublier">Mot de passe oublié ?</a>
                    <button type="submit" class="btn btn-primary btn-connecter-accueil">Se connecter</button>
                </form>
                <a href="<?= $path ?>/register"class="btn-inscription">
                <button class="btn btn-primary btn-inscription-accueil">S'inscrire</button></a>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>