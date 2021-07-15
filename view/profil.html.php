<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
   <?php require "navbar.html.php" ?>
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
         <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="list-group">
               <button type="button" class="list-group-item list-group-item-action active">
                  Paramètres
               </button>
               <button type="button" class="list-group-item list-group-item-action"><a
                     href="<?= $path ?>/account">Modifier mes
                     informations</a></button>
               <button type="button" class="list-group-item list-group-item-action"><a
                     href="<?= $path ?>/password">Modifier mon mot de
                     passe</a></button>
               <button type="button" class="list-group-item list-group-item-action"><a href="<?= $path ?>/friends">Ma
                     liste
                     d'amis</a></button>
               <button type="button" class="list-group-item list-group-item-action"><a
                     href="<?= $path ?>/requestfriends">Mes demandes d'amis
                     d'amis</a></button>
            </div>
         </div>
         <!--------------->
         <!-- COLONNE 2 -->
         <!--------------->
         <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="jumbotron">
               <h1 class="display-4 effet-degrade text-center">Quoi de neuf
                  <?= $_SESSION['user']->prenom ?> ?
               </h1>
            </div>
            <form action="<?= $path ?>/publication_profil" method="POST" class="formulaire_connection" style="">
               <div class="form-group">
                  <input class="form-control" id="messagePublication" name="messagePublication" rows="3"
                     maxlength="255">
               </div>
               <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-connecter-accueil">Publier</button>
               </div>
            </form>
            <div class="jumbotron">
               <?php foreach($publications as $publication):?>
               <div class="alert alert-primary" role="alert">
                  <div class="row">
                     <div class="col-lg-10 col-md-10 col-sm-10">
                        <p><?= $_SESSION['user']->prenom ?> <?= $_SESSION['user']->nom ?>
                           <?= $publication->date_publication ?>
                        </p>
                        <p> <?= $publication->contenu ?></p>
                        <?php foreach($commentaires as $commentaire):?>
                        <?php if($commentaire->id_publication == $publication->id_publication){
                           
                           if($_SESSION['user']->id_user == $commentaire->id_user){
                              echo "<div class='alert alert-warning' role='alert'>
                            $commentaire->nom $commentaire->prenom :
                            $commentaire->contenu
                           </div>";
                           } else {
                              echo "<div class='alert alert-danger' role='alert'>
                            $commentaire->nom $commentaire->prenom :
                            $commentaire->contenu
                           </div>";
                           }

                        } ?>

                        <?php endforeach;?>

                     </div>   


                     <div class="col-lg-2 col-md-2 col-sm-2">

                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                           data-bs-target="#modifier<?= $publication->id_publication ?>">
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="modifier<?= $publication->id_publication ?>" tabindex="-1"
                           aria-labelledby="Titre" role="dialog" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="Titre">Modifier ma publication</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                       aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?= $path ?>/updatePublish/<?= $publication->id_publication ?>"
                                       method="POST">
                                       <div class="form-group">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <label for="messageModifier">Modifier la publication</label>
                                                   <textarea class="form-control" id="messageModifier"
                                                      name="messageModifier"
                                                      rows="3"><?= $publication->contenu ?></textarea>
                                                </div>

                                                <button type="button" class="btn btn-danger"
                                                   data-bs-dismiss="modal">Annuler</button>

                                                <button type="submit" class="btn btn-success">Modifier</button>

                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer<?= $publication->id_publication ?>">
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="supprimer<?= $publication->id_publication ?>" tabindex="-1" aria-labelledby="Titre" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="Titre">Supprimer ma publication</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                       aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                    Etes vous certain(e) de vouloir supprimer cette publication ?
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-success"
                                       data-bs-dismiss="modal">Annuler</button>
                                    <a href="<?= $path ?>/deletePublish/<?= $publication->id_publication ?>"
                                       class="btn-inscription">
                                       <button type="button" class="btn btn-danger">Supprimer</button></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- <?php var_dump($publications) ?> -->


                  <form action="<?= $path ?>/insertCommentaire/<?= $publication->id_publication ?>" method="POST"
                     class="">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-10">
                              <input class="form-control" id="commentaire" name="commentaire"
                                 placeholder="Laisser un commentaire " maxlength="255">
                           </div>
                           <div class="col-md-2">
                              <div class="text-center">
                                 <button type="submit" class="btn btn-warning"></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>


               </div>
               <?php endforeach;?>
            </div>
         </div>
         <!--------------->
         <!-- COLONNE 3 -->
         <!--------------->
         <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="jumbotron jumbotron-fluid">
               <div class="container">
                  <h1 class="display-4 effet-degrade text-center">Mon profil</h1>
                  <p class="text-center"><?= $_SESSION['user']->nom ?> <?= $_SESSION['user']->prenom ?></p>
                  <p class="text-center"><?= $_SESSION['user']->email ?></p>
                  <p class="text-center">Inscrit depuis le : <?= $_SESSION['user']->date_inscription ?></p>
               </div>
            </div>
            <div class="jumbotron jumbotron-fluid">
               <div class="container">
                  <h1 class="display-4 effet-degrade text-center">Mes amis</h1>
                  <?php foreach($infos as $info):?>
                  <?php if($info->acceptation == 1){
                        if($_SESSION['user']->id_user == $info->id_demandeur){
                                echo" <div class='alert alert-primary' role='alert'>
                                <div class='row'>
                                <div class='col-lg-10 col-md-8 col-sm-6'>
                                <p>" .$info->nom. ' ' .$info->prenom."</p> 
                                </div>
                                <div class='col-lg-2 col-md-4 col-sm-6'>
                                <a href='$path/seeuser/$info->id_user'><img src='public/images/person-square.png' 'width='30' height='30'
                                class='d-inline-block align-top' alt='kikbook-logo'></a>
                                </div>
                                </div>
                                </div>";
                            }
                            }
                            else{
                            } ?>
                  <!-- <?php var_dump($infos)?> -->
                  <?php endforeach;?>
                  <?php foreach($informations as $info):?>
                  <?php if($info->acceptation == 1){
                        if($_SESSION['user']->id_user == $info->id_repondant){
                            echo" <div class='alert alert-primary' role='alert'>
                            <div class='row'>
                            <div class='col-lg-10 col-md-8 col-sm-6'>
                            <p>" .$info->nom. ' ' .$info->prenom."</p> 
                            </div>
                            <div class='col-lg-2 col-md-4 col-sm-6'>
                            <a href='$path/seeuser/$info->id_user'><img src='public/images/person-square.png' 'width='30' height='30'
                            class='d-inline-block align-top' alt='kikbook-logo'></a>
                            </div>
                            </div>
                            </div>";
                            }
                            }
                            else{
                            } ?>
                  <?php endforeach;?>
                  <div class="text-center">
                     <button type="button" class="list-group-item list-group-item-action"><a
                           href="<?= $path ?>/friends">Voir tout mes amis
                           d'amis</a></button>
                  </div>
               </div>
            </div>
            <div class="jumbotron jumbotron-fluid">
               <div class="container">
                  <h6 class="display-4 effet-degrade text-center">Rechercher des amis</h6>
                  <?php foreach($users as $user):?>
                     <?php if($user->id_user == $_SESSION['user']->id_user){
                              echo"<div style='display:none;'></div>";
                               } 
                           elseif($user->id_user !== $_SESSION['user']->id_user) {
                              echo"<div class='col text-center'>
                                    <div class='alert alert-primary' role='alert'>
                                    <div class='row'>
                                    <div class='col-md-6'>" .$user->nom. ' ' .$user->prenom. "</div>
                                    <div class='col-md-6'> <a class='btn btn-success' href='$path/addFriends/$user->id_user'>Ajouter</a></div>
                                    </div>
                                    </div>
                                    </div>";
                                 }
                                 ?>
                     <?php endforeach;?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>