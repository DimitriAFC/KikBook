<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <div class="col-md-12">
                <?php if(isset($_SESSION['erreur'])){ ?>
                <div class="alert alert-warning text-center">
                    <?= $_SESSION['erreur'] ?>
                </div>
                <?php } unset($_SESSION['erreur']); ?>
                <?php if(isset($_SESSION['succes'])){ ?>
                <div class="alert alert-success text-center">
                    <?= $_SESSION['succes'] ?>
                </div>
                <?php } unset($_SESSION['succes'])?>
            </div>
                    <button type="submit" class="btn btn-primary"><a href="<?= $path ?>/profil">Retour au
                            profil</a></button>
                    <div class="alert alert-danger text-center" role="alert">
                    Changer mon mot de passe 
                </div>
                <form action="<?= $path ?>/updatePassword" method="POST" class="formulaire_inscription">
                    <div class="form-group">
                        <label for="password">Changer le mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Nouveau mot de passe" name="password">
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Comfirmer le mot de passe</label>
                        <input type="password" class="form-control" id="newPassword" placeholder="Comfirmez le mot de passe" name="newPassword">
                    </div>
                    <button type="submit" class="btn btn-primary btn-inscription-accueil">Mettre à jour</button>
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