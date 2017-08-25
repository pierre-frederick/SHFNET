<?php
$pageArray = array();
$pageArray['title'] = "Domotique";
$pageArray['description'] = "Domotique";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>

<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-home"></i> <?php echo $pageArray['title'] ?></h1>

        <div class="row minimenu">
            <div class="col-md-6 col-md-offset-3">
                <h2>Domoticz</h2>
                <div class="list-group">
                    <a href="introduction_domoticz.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Introduction à Domoticz</h4>
                        <p class="list-group-item-text">Choix du matériel et installation</p>
                    </a>
                    <a href="capteurs_sans_fils.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Ajouter des périphériques sans-fil</h4>
                        <p class="list-group-item-text">Connecter une prise télécommandée, un compteur EDF</p>
                    </a>
                    <a href="capteurs_fils.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Ajouter des capteurs connectés sur le Raspi</h4>
                        <p class="list-group-item-text">Connecter un capteur de température, humidité...</p>
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>