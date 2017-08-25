<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Initiation perfectionnnement arduino avancé arduino">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <title>Théorie</title>
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
        <h1 class="title"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Théorie</h1>

        <h2 class="text-center">Composants passifs</h2>
        <div class="row minimenu">
            <div class="col-md-6 col-md-offset-3">

                <div class="list-group">
                    <a href="resistance.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Résistance</h4>
                        <p class="list-group-item-text">Résistance 1/4W, potentiomètre, de puissance.</p>
                    </a>
                    <a href="condensateur.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Condensateur</h4>
                        <p class="list-group-item-text">Condensateur céramique, chimique, variable</p>
                    </a>
                    <a href="bobine.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Bobine</h4>
                        <p class="list-group-item-text">selfs, inductances bobines</p>
                    </a>
                    <a href="diode.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Diode</h4>
                        <p class="list-group-item-text">Diode de redessement, LED, zener.</p>
                    </a>
                    <a href="quartz.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Quartz</h4>
                        <p class="list-group-item-text">Horloges et générateurs de signaux.</p>
                    </a>
                </div>
            </div>
        </div>


        <h2 class="text-center">Composants actifs</h2>
        <div class="row minimenu">
            <div class="col-md-6 col-md-offset-3">

                <div class="list-group">
                    <a href="transistor.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Transistor</h4>
                        <p class="list-group-item-text">bipolaires NPN et PNP, MOSFET, JFET</p>
                    </a>
                    <a href="aop.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">AOP</h4>
                        <p class="list-group-item-text">Amplificateurs opérationnels</p>
                    </a>
                    <a href="regulateur.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Régulateurs</h4>
                        <p class="list-group-item-text">Régulateurs de tension linéaires</p>
                    </a>
                </div>
            </div>
        </div>

        <h2 class="text-center">Electronique de puissance</h2>
        <div class="row minimenu">
            <div class="col-md-6 col-md-offset-3">

                <div class="list-group">
                    <a href="transformateurs.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Transformateurs</h4>
                        <p class="list-group-item-text">Dimensionnement des transformateurs pour alimentations</p>
                    </a>
                    <a href="thyristor_triac_diac.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Thyristors, diacs et triacs</h4>
                        <p class="list-group-item-text">Vous oubliez tout le temps de sens de branchement de ce
                            transistor ?</p>
                    </a>
                    <a href="batteries_piles.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Piles et batteries</h4>
                        <p class="list-group-item-text">Choix des types de batteries et alimentation</p>
                    </a>
                </div>
            </div>
        </div>

        <h2 class="text-center">Interfaces hommes-machines</h2>
        <div class="row minimenu">
            <div class="col-md-6 col-md-offset-3">

                <div class="list-group">
                    <a href="commutateurs.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Commutateurs</h4>
                        <p class="list-group-item-text">SPDT ou 1P12T ? on-off ou (on)-off ? </p>
                    </a>
                    <a href="buzzer.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Buzzer</h4>
                        <p class="list-group-item-text">Signaler un évènement ou un danger</p>
                    </a>
                    <a href="afficheur_led.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Afficheurs à led</h4>
                        <p class="list-group-item-text">Pour faire passer un message </p>
                    </a>
                </div>
            </div>
        </div>

        <h2 class="text-center">Boîtiers & co</h2>
        <div class="row minimenu">
            <div class="col-md-6 col-md-offset-3">

                <div class="list-group">
                    <a href="radiateurs.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Radiateurs</h4>
                        <p class="list-group-item-text">Dimensionnement des radiateurs de refroidissement</p>
                    </a>
                    <a href="ventilateurs.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Ventilateurs</h4>
                        <p class="list-group-item-text">Choix des ventilateurs pour un boîtier</p>
                    </a>
                    <a href="boitiers.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Boitiers</h4>
                        <p class="list-group-item-text">Choix d'un boitier pour un système</p>
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