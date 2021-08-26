<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
        <h1 class="display-4 effet-degrade text-center" style="font-size:35px;">Liste des utilisateurs</h1>
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

                    <?php foreach($users as $user):?>

                        <?php if($user->id_user !== $_SESSION['user']->id_user)
                     {
                        echo"<div class='col text-center'>
                        <div class='alert alert-primary' role='alert'>
                        <div class='row'>
                        <div class='col-md-8'>" .$user->nom. ' ' .$user->prenom. "</div>
                        <div class='col-md-4'> <a class='btn btn-success' href='$path/addFriends/$user->id_user'>Demander en ami</a></div>
                        </div>
                        </div>
                        </div>";
                     } 
                                 ?>
 
                  <?php endforeach;?>

                  
           
		</div>
	</div>
</div>

    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>