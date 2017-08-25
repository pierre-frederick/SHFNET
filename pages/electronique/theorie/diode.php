<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="shfnet theorie diode">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <title>Diode</title>
    <!-- Bootstrap core CSS -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/custom/css/flexslider.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/assets/custom/css/parallax-slider.css" type="text/css">
    <!-- CSS Template -->
    <link href="/assets/custom/css/business-plate.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link href="/assets/custom/css/shfnet.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <script src="https://use.fontawesome.com/da91765651.js"></script>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


<div class="container">
    <div class="article">

        <h1 class="title"><i class="fa fa-step-forward"></i> Diode</h1>

        <a href="index.php" class="btn btn-secondary">&larr; Retour au menu</a>

        <div class="row introduction">
            <div class="col-md-12">
                <h2>Introduction</h2>
                <p>Un quartz est un composant passif qui résonne à une fréquence stable. Ils sont utilisés sur des
                    horloges, oscillateurs…
                    Il existe plusieurs types de boîtier, principalement : HC18, HC25, HC33, HC38 ou encore HC49.</p>
            </div>
        </div>

        <div class="row menuarticle">
            <!--
                          <ul>
                              <li><a href="#electro">Buzzer électro-mécanique</a></li>
                              <li><a href="#piezzo">Buzzer piézo-électrique</a></li>
                          </ul>
                          </div>
                          <hr />
                          <!-- Type de commutation
                          <div class="row paragraph">
                              <div class="col-md-6 ptext">
                                  <h3 id="electro">Buzzer électro-mécanique</h3>
                                  <p>Fonctionne avec une tension continue, qui peut être de 12v ou 230V par exemple. L’intensité sonore peut être modulée par une variation de la tension d’alimentation.</p>

                              </div>
                              <div class="col-md-6 pimage">
                                  <img class="img-responsive" src="img/buzzer/buzzer_electro.png" alt="buzzer electro mecanique">
                              </div>
                          </div>
                          <hr />
                          <!-- Configuration de contacts
                          <div class="row">
                              <div class="col-md-6 pimage">
                                  <img class="img-responsive" src="img/buzzer/buzzer_piezo.png" alt="buzzer piezo electrique">
                              </div>
                              <div class="col-md-6 ptext">
                                  <h3 id="piezzo">Buzzer piézo-électrique</h3>
                                  <p>Ce type de buzzer se présente sous la forme d’une capsule très fine, que l’on alimente avec un signal rectangulaire de quelques dizaines de volts et quelques  kHz.<br />
                                      Ce type de transducteur fonctionne également à l’inverse, et convertit l’énergie mécanique reçue en énergie électrique. Il peut donc servir de détecteur de choc.<br />
                                      Transducteur piézo-électrique avec oscillateur intégré<br />
                                      Certains Transducteurs comportent un oscillateur intégré, et il suffit de les alimenter avec une tension continue pour qu’il produise un son.<br />
                                  </p>
                              </div>
                          </div>
            -->
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>