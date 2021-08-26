<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
        <h1 class="display-4 effet-degrade text-center" style="font-size:35px;">Mes demandes amis</h1>
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

                <?php foreach($requests as $request):?>
                        <?php if($request->acceptation == 0){
                            if($_SESSION['user']->id_user == $request->id_repondant){
                                    echo" <div class='alert alert-primary' role='alert'>
                                    <p>Demande d'amis de : $request->nom  $request->prenom</p> 
                                    <p>Date de demande : $request->date_ajout  </p>
                                    <p><a class='btn btn-success' href='$path/acceptFriends/$request->id_relation'>Accepter</a>
                                    <a class='btn btn-danger' href='$path/suppFriends/$request->id_relation'>Refuser</a></p>

                                    </div>";
                                }
                                }
                                else{
                                 echo"<div style='display:none;'></div>";
                                } ?>
                        <?php endforeach;?>
                        
		</div>
	</div>
</div>

    <?php require "footer.html" ?>
</body>
<?php require "script.html.php" ?>

</html>