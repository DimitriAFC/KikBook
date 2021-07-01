<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>
    <div class="container-fluid">
	<div class="row">
    <div class="col-md-2"></div>
		<div class="col-md-8">
        <h1 class="display-4 effet-degrade text-center" style="font-size:35px;">Mes amis</h1>
        <?php if(isset($_SESSION['erreur'])){ ?>
                <div class="alert alert-warning text-center" style="margin:20px; 0px;">
                    <?= $_SESSION['erreur'] ?>
                </div>
                <?php } unset($_SESSION['erreur']); ?>
                <?php if(isset($_SESSION['succes'])){ ?>
                <div class="alert alert-success text-center" style="margin:20px; 0px;">
                    <?= $_SESSION['succes'] ?>
                </div>
                <?php } unset($_SESSION['succes'])?>
        <?php foreach($informations as $info):?>
                        <?php if($info->acceptation == 1){
                            if($_SESSION['user']->id_user == $info->id_repondant){
                                    echo" <div class='alert alert-primary' role='alert'>
                                    <p>Amis avec: " .$info->nom. ' ' .$info->prenom. "</p> 
                                    <p>Depuis le: " .$info->date_ajout. "</p>
                                    <p><a class='btn btn-danger' href='$path/suppFriends/$info->id_relation'>Supprimer</a>
                                    </div>";
                                }
                                }
                                else{
                                 echo"<div style='display:none;'></div>";
                                } ?>
                        <?php endforeach;?>
                        <?php foreach($infos as $info):?>
                        <?php if($info->acceptation == 1){
                            if($_SESSION['user']->id_user == $info->id_demandeur){
                                    echo" <div class='alert alert-primary' role='alert'>
                                    <p>Amis avec: " .$info->nom. ' ' .$info->prenom. "</p> 
                                    <p>Depuis le: " .$info->date_ajout. "</p>
                                    <p><a class='btn btn-danger' href='$path/suppFriends/$info->id_relation'>Supprimer</a>
                                    </div>";
                                }
                                }
                                else{
                                 echo"<div style='display:none;'></div>";
                                } ?>
                        <?php endforeach;?>
		</div>
        <div class="col-md-2"></div>
	</div>
</div>

    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>