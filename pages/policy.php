<?php
$pageArray = array();
$pageArray['title'] = "Conditions";
$pageArray['description'] = "Apprenez à gérer le réseau sous linux, les interfaces, les adresses IP";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-hdd-o"></i> <?php echo $pageArray['title'] ?></h1>

        <div class="row introduction">
            <div class="col-md-12 content">
                <div class="row">


                </div>    <!-- Fin de col-9 content -->


            </div>
        </div>
    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>