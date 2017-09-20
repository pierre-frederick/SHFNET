<?php
$pageArray = array();
$pageArray['title'] = "Radiateurs";
$pageArray['description'] = "Théorie sur les radiateurs.";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>

<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-snowflake-o"></i> <?php echo $pageArray['title'] ?></h1>


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
                <p>Un ventilateur est un élément crucial dans certains systèmes afin de garantir l'élimination de
                    l'excès
                    de chaleur émis par les composants. Il existe plusieurs milliers de modèles, suivant leurs
                    application. <br/>
                    Généralement associé à un asservissement, il permet de réguler une température dans un boîtier par
                    exemple.<br/>
                </p>
                <p>En électronique, il est recommandé d'utiliser un refroidissement passif à base de radiateurs, car
                    cela permet de rendre les coffrets étanches et éviter l'empoussièrement et donc le risque de panne.
                    Cependant, dans certaines applications de puissance (alimentation à découpage, contrôle de moteurs,
                    régulation de tension</p>
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
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>