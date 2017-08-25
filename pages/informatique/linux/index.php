<?php
$pageArray = array();
$pageArray['title'] = "Linux";
$pageArray['description'] = "Linux";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>

<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-linux"></i> <?php echo $pageArray['title'] ?></h1>

        <div class="row minimenu">
            <div class="col-md-6 col-md-offset-3">
                <h2>Administration système</h2>
                <div class="list-group">
                    <a href="gestion_disques.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Gestion du stockage sur linux</h4>
                        <p class="list-group-item-text">Gestion des partitions et des disques</p>
                    </a>
                    <a href="monitoring_systeme.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Monitoring système</h4>
                        <p class="list-group-item-text">Surveillez un serveur sous linux.</p>
                    </a>
                    <a href="gestion_utilisateurs.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Gestion des utilisateurs</h4>
                        <p class="list-group-item-text">Gérer les utilisateurs et les droits.</p>
                    </a>
                    <a href="gestion_reseau.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Gestion du réseau</h4>
                        <p class="list-group-item-text">Gestion des interfaces ehernet et sans-fil.</p>
                    </a>
                    <a href="script_bash.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Scripts Bash et tâches cron</h4>
                        <p class="list-group-item-text">Automatiser des actions système.</p>
                    </a>
                    <a href="sauvegarde.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Sauvegarde</h4>
                        <p class="list-group-item-text">Sauvegarde de données et système.</p>
                    </a>
                </div>
                <h2>Distributions</h2>
                <div class="list-group">
                    <a href="distrib_debian.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Distribution Debian</h4>
                        <p class="list-group-item-text">Découvrez le système d'exploitation universel.</p>
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