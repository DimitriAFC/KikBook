<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>

<body>
    <header>
        <?php require "navbar.html.php" ?>
        <div class="container-fluid header-fond">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-fluid header-fond">
                        <div class="row">
                            <div class="col-md-12"> <img src="public/images/kikbook-nom.png"
                                    class="img-fluid header-news" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid header-fond">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid header-fond">
                    <div class="row">
                        <?php foreach($news as $new):?>
                        <div class="col-md-12">
                            <div class="card text-center">
                                <div class="card-header">Featured</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $new->titre ?></h5>
                                    <p class="card-text">
                                        <?= $new->contenu ?>
                                    </p>
                                    <a href='<?= $path ?>/news/<?= $new->id_article ?>' class="btn btn-primary">Lire la suite</a>
                                </div>
                                <div class="card-footer text-muted">Le : <?= $new->date_publication ?></div>
                            </div>
                        </div>
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