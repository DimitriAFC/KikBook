<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>
    <div class="container-fluid" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <h3 class="display-4 text-center">Bonjour <?= $_SESSION['user']->prenom ?> <?= $_SESSION['user']->nom ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-4">
                <div class="alert alert-dark text-center" role="alert">
                    Modifier mon avatar
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-dark text-center" role="alert">
                    Mettre mon profil à jour
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-dark text-center" role="alert">
                    Mes collègues
                </div>
            </div>
        </div>
    </div>
    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>