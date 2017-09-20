<?php
$pageArray = array();
$pageArray['title'] = "Buzzers";
$pageArray['description'] = "Théorie sur les Buzzers.";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>

<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-bell-o"></i> <?php echo $pageArray['title'] ?></h1>


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
                <p>Le choix d'un commutateur peut être compliqué si il doit répondre à des exigences précises ou si la
                    configuration de contact est singulière. </p>
            </div>
        </div>

        <div class="row menuarticle">

            <ul>
                <li><a href="#electro">Buzzer électro-mécanique</a></li>
                <li><a href="#piezzo">Buzzer piézo-électrique</a></li>
            </ul>
        </div>
        <hr/>

        <!-- Type de commutation -->
        <div class="row paragraph">
            <div class="col-md-6 ptext">
                <h3 id="electro">Buzzer électro-mécanique</h3>
                <p>Fonctionne avec une tension continue, qui peut être de 12v ou 230V par exemple. L’intensité sonore
                    peut être modulée par une variation de la tension d’alimentation.</p>

            </div>
            <div class="col-md-6 pimage">
                <img class="img-responsive" src="img/buzzer/buzzer_electro.png" alt="buzzer electro mecanique">
            </div>
        </div>
        <hr/>
        <!-- Configuration de contacts -->
        <div class="row">
            <div class="col-md-6 pimage">
                <img class="img-responsive" src="img/buzzer/buzzer_piezo.png" alt="buzzer piezo electrique">
            </div>
            <div class="col-md-6 ptext">
                <h3 id="piezzo">Buzzer piézo-électrique</h3>
                <p>Ce type de buzzer se présente sous la forme d’une capsule très fine, que l’on alimente avec un signal
                    rectangulaire de quelques dizaines de volts et quelques kHz.<br/>
                    Ce type de transducteur fonctionne également à l’inverse, et convertit l’énergie mécanique reçue en
                    énergie électrique. Il peut donc servir de détecteur de choc.<br/>
                    Transducteur piézo-électrique avec oscillateur intégré<br/>
                    Certains Transducteurs comportent un oscillateur intégré, et il suffit de les alimenter avec une
                    tension continue pour qu’il produise un son.<br/>
                </p>
            </div>
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