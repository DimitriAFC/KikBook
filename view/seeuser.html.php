<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/white-theme.css" />
    <link rel="stylesheet" href="../public/css/dark-theme.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300&display=swap" rel="stylesheet">
    <title>Kikbook</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:50px;">
        <div class="container-fluid">
            <img src="../public/images/kikbook-logo.png" width="100" height="100"
                class="d-inline-block align-top logo-kik" alt="kikbook-logo">
            <img src="../public/images/kikbook-nom.png" class="d-inline-block align-top nom-kik" alt="kikbook-logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-item nav-mobile">
                        <a class="nav-link" href="<?= $path ?>/news">Accueil</a>
                    </li>
                    <li class="nav-item nav-mobile">
                        <a class="nav-link" href="<?= $path ?>/profil">Mon profil</a>
                    </li>
                    <li class="nav-item nav-mobile">
                        <a class="nav-link" href="<?= $path ?>/profil">Chat</a>
                    </li>
                    <li class="nav-item nav-mobile">
                        <a style="color:red;" class="nav-link" href="<?= $path ?>/off">Déconnexion</a>
                    </li>
                </ul>
                <ul class="ml-auto navbar-nav nav-ordinateur" style="margin-right:30px;">
                    <li>
                        <a href="<?= $path ?>/news" style="margin-right:20px;">
                            <img src="../public/images/house-fill.png" width="30" height="30"
                                class="d-inline-block align-top" alt="kikbook-logo">
                        </a>
                    </li>
                    <li>
                        <a href="<?= $path ?>/profil" style="margin-right:20px;">
                            <img src="../public/images/person-square.png" width="30" height="30"
                                class="d-inline-block align-top" alt="kikbook-logo">
                        </a>
                    </li>
                    <li>
                        <a href="<?= $path ?>/profil" style="margin-right:20px;">
                            <img src="../public/images/chat-left-text-fill.png" width="30" height="30"
                                class="d-inline-block align-top" alt="kikbook-logo">
                        </a>
                    </li>
                    <li>
                        <a href="<?= $path ?>/off">
                            <img src="../public/images/x-square-fill.png" width="30" height="30"
                                class="d-inline-block align-top" alt="kikbook-logo">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
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
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!--------------->
            <!-- COLONNE 1 -->
            <!--------------->
            <div class="col-md-3">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4 effet-degrade text-center">Son profil</h1>
                        <p class="text-center"></p>
                        <p class="text-center"></p>
                        <p class="text-center"></p>
                    </div>
                </div>
            </div>
            <!--------------->
            <!-- COLONNE 2 -->
            <!--------------->
            <div class="col-md-4">
                <div class="jumbotron">
                    <h1 class="display-4 effet-degrade text-center">Publications de </h1>
                </div>
            </div>
            <!--------------->
            <!-- COLONNE 3 -->
            <!--------------->
            <div class="col-md-3">
            </div>
            <!--------------->
            <!-- COLONNE 4 -->
            <!--------------->
            <div class="col-md-2">

            </div>
        </div>
    </div>

    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>