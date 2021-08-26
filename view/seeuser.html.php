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
                    <!-- <li class="nav-item nav-mobile">
                        <a class="nav-link" href="<?= $path ?>/news">Accueil</a>
                    </li> -->
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
                    <!-- <li>
                        <a href="<?= $path ?>/news" style="margin-right:20px;">
                            <img src="../public/images/house-fill.png" width="30" height="30"
                                class="d-inline-block align-top" alt="kikbook-logo">
                        </a>
                    </li> -->
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
                <?php
                if (isset($_SESSION["erreur"])) { ?>
                <div class="alert alert-warning text-center">
                    <?= $_SESSION["erreur"] ?>
                </div>
                <?php }
                unset($_SESSION["erreur"]);
                ?>
                <?php
                if (isset($_SESSION["succes"])) { ?>
                <div class="alert alert-success text-center">
                    <?= $_SESSION["succes"] ?>
                </div>
                <?php }
                unset($_SESSION["succes"]);
                ?>
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
                        <?php foreach ($users as $user): ?>
                        <h1 class="display-4 effet-degrade text-center">Son profil</h1>
                        <p class="text-center"><?= $user->prenom ?> <?= $user->nom ?></p>
                        <p class="text-center"><?= $user->email ?></p>
                        <p class="text-center"><?= $user->date_inscription ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!--------------->
            <!-- COLONNE 2 -->
            <!--------------->
            <div class="col-md-7">
                <div class="jumbotron">
                    <h1 class="display-4 effet-degrade text-center" style="font-size:25px;">Publications de
                        <?= $user->prenom ?> <?= $user->nom ?> </h1>
                    <?php foreach ($users as $user): ?>
                    <?php foreach ($friends as $friend): ?>
                    <?php
                        if($user->id_user === $friend->id_demandeur AND $_SESSION['user']->id_user === $friend->id_repondant AND $friend->acceptation == 1 OR $user->id_user === $friend->id_repondant AND $_SESSION['user']->id_user === $friend->id_demandeur AND $friend->acceptation == 1){
                        
                        foreach ($elements as $element){
                            if ($id_user == $element->id_user_publication){
                                echo "     
                                <div class='alert alert-primary' role='alert'>
                                <div class='row'>
                                <div class='col-lg-12 col-md-12 col-sm-12'>
                                <p>" .$element->nom ." " .$element->prenom ."</p>
                                <p>Le " .$element->date_publication ."</p>
                                <p>" .$element->contenu ."</p>";

                                foreach ($commentaires as $commentaire){
                                    if ($commentaire->id_publication == $element->id_publication){
                                        if ($_SESSION["user"]->id_user == $commentaire->id_user){
                                            echo "<div class='alert alert-warning' role='alert'>
                                <div class='row'>
                                <div class='col-lg-10 col-md-10 col-sm-10'>
                              $commentaire->nom $commentaire->prenom :
                              $commentaire->contenu
                             </div>
                             <div class='col-lg-2 col-md-2 col-sm-2'> 
                             <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#commentaire$commentaire->id_commentaire'>
                             </button>
                             <!-- Modal -->
                             <div class='modal fade' id='commentaire$commentaire->id_commentaire' tabindex='-1' aria-labelledby='Titre' aria-hidden='true'>
                                <div class='modal-dialog'>
                                   <div class='modal-content'>
                                      <div class='modal-header'>
                                         <h5 class='modal-title' id='Titre'>Supprimer mon commentaire</h5>
                                         <button type='button' class='btn-close' data-bs-dismiss='modal'
                                            aria-label='Close'></button>
                                      </div>
                                      <div class='modal-body'>
                                         Etes vous certain(e) de vouloir supprimer ce commentaire ?
                                      </div>
                                      <div class='modal-footer'>
                                         <button type='button' class='btn btn-success'
                                            data-bs-dismiss='modal'>Annuler</button>
                                         <a href='$path/deleteCommentaire/$commentaire->id_commentaire'
                                            class='btn-inscription'>
                                            <button type='button' class='btn btn-danger'>Supprimer</button></a>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                                </div>
                                   </div>"; 
                                        }
                                        else {
                                            echo "<div class='alert alert-danger' role='alert'>
                                        $commentaire->nom $commentaire->prenom :
                                        $commentaire->contenu
                                       </div>";
                                        }
                                    }
                                }
                            }
                            echo "<form action='$path/insertCommentaireProfil/$element->id_publication' method='POST'
                            class=''>
                            <div class='form-group'>
                                <div class='row'>
                                    <div class='col-md-10'>
                                        <input class='form-control' id='commentaire' name='commentaire'
                                            placeholder='Laisser un commentaire' maxlength='255'>
                                    </div>
                                    <div class='col-md-2'>
                                        <div class='text-center'>
                                            <button type='submit' class='btn btn-warning'></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>";
                            }
                        } else {
                            echo "<div class='alert alert-danger text-center' role='alert'> Vous n'êtes pas encore ami, pour voir les publications de cette utilisateur merci de lui envoyer une reqûete.</div>";
                        }


                        ?>

                    <?php endforeach; ?>
                    <?php endforeach; ?>

                </div>
            </div>
            <!--------------->
            <!-- COLONNE 3 -->
            <!--------------->
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <?php require "footer.html"; ?>
</body>
<script src="../vendor/components/jquery/jquery.min.js"></script>
<script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

</html>