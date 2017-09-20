<?php
$pageArray = array();
$pageArray['title'] = "Condensateur";
$pageArray['description'] = "Théorie sur les condensateurs.";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>

<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-pause"></i> <?php echo $pageArray['title'] ?></h1>


        <div class="row">
            <div class="col-md-10">
                <a href="index.php" class="btn btn-info">&larr; Retour au menu</a>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-info">Résumé en fiche</a>
            </div>
        </div>


        <div class="row introduction">
            <div class="col-md-12">
                <h2>Introduction</h2>
                <p>Bientôt... </p>
            </div>
        </div>


        <div class="row menuarticle">
            <ul>
                <li><a href="#item">Item </a></li>

            </ul>
        </div>

        <hr/>

        <div class="row paragraph">
            <h2 id="item"> Titre </h2>
            <p>Texte</p>

        </div>

        <div class="sources">
            <h3>Sources et liens pour en savoir plus :</h3>
            <ul>
                <li><a href="">Lien</a>
                </li>

            </ul>

        </div>

    </div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>