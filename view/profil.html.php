<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-top:60px;">
                <div class="alert alert-warning text-center" role="alert">
                    Bonjour <?= $_SESSION['user']->prenom ?> <?= $_SESSION['user']->nom ?>
                </div>
                <div class="row">
                    <div class="col-md-4" style="margin-top:60px;">
                        <div class="list-group">
                            <button type="button" class="list-group-item list-group-item-action active">
                                Paramètres
                            </button>
                            <button type="button" class="list-group-item list-group-item-action"><a href="<?= $path ?>/account">Modifier mes
                                informations</a></button>
                            <button type="button" class="list-group-item list-group-item-action"><a href="<?= $path ?>/password">Modifier mon mot de
                                passe</a></button>
                            <button type="button" class="list-group-item list-group-item-action"><a href="<?= $path ?>/friends">Ma liste
                                d'amis</a></button>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top:60px;">
                        <div class="alert alert-dark text-center" role="alert">
                            Paramètres généraux du compte
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="list-group list-group-flush">
                                        <button type="button" class="list-group-item list-group-item-action">Votre
                                            Nom</button>
                                        <button type="button" class="list-group-item list-group-item-action ">Votre
                                            Prénom</button>
                                        <button type="button" class="list-group-item list-group-item-action">Votre
                                            Adresse e-mail</button>
                                        <button type="button" class="list-group-item list-group-item-action ">Votre Date
                                            de naissance</button>
                                        <button type="button" class="list-group-item list-group-item-action">Vous êtes
                                            un / une</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="list-group list-group-flush">
                                        <button type="button"
                                            class="list-group-item list-group-item-action "><?= $_SESSION['user']->nom ?></button>
                                        <button type="button"
                                            class="list-group-item list-group-item-action "><?= $_SESSION['user']->prenom ?></button>
                                        <button type="button"
                                            class="list-group-item list-group-item-action "><?= $_SESSION['user']->email ?></button>
                                        <button type="button"
                                            class="list-group-item list-group-item-action "><?= $_SESSION['user']->date_naissance ?></button>
                                        <button type="button"
                                            class="list-group-item list-group-item-action "><?= $_SESSION['user']->genre ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>