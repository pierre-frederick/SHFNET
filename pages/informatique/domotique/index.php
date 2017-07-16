<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Domotique shfnet">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <title>Domotique</title>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" >
    <link href="/assets/custom/css/shfnet.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <script src="https://use.fontawesome.com/da91765651.js"></script>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/elements/header.php"); ?>


<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-home"></i>  Domotique</h1>

        <div class="row introduction">
            <div class="col-md-12">
                <h2>Introduction</h2>
                <p>Voici les composants constituant un PC.</p>
            </div>
        </div>

        <div class="row menuarticle">

            <ul>
                <li><a href="">Constitution d'un PC</a></li>
                <li> <a href="#composants">Choix des composants</a>
                    <ul>
                        <li><a href="#alimentation">L'alimentation</a></li>
                        <li><a href="#cartemere">La carte mère</a></li>
                        <li><a href="#processeur">Le processeur</a></li>
                        <li><a href="#memoire">La mémoire</a></li>
                        <li><a href="#disques">Les disques durs</a></li>
                        <li><a href="#boitier">Le boitier</a></li>
                        <li><a href="#autres">Les autres périphériques</a></li>
                    </ul>
                </li>
                <li><a href="#montage">Montage</a></li>
                <li><a href="#configuration">Exemples de Configurations </a></li>
            </ul>
        </div>

        <h2 id="composants"></h2>
        <!-- Résistances -->
        <div class="row paragraph">
            <div class="col-md-8 ptext">
                <h3 id="alimentation">L'alimentation</h3>
                <p>Choisir son alimentation.</p>
            </div>
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/recup_resistances.jpg" alt="Récupération résistances">
            </div>
        </div>
        <hr />
        <!-- Condensateurs -->
        <div class="row">
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/recup_condensateurs.jpg" alt="Récupération condensateurs">
            </div>
            <div class="col-md-8 ptext">
                <h3>Les condensateurs</h3>
                <p>Les condensateurs ne valent à être récupérés si leur valeur est assez importante (>470uF) et si leur aspect est comme neuf. Les composants gonflés,
                    qui ont coulés, avec des traces de brûlé sont à proscrire. Tester leur valeur avec un multimètre.</p>
                <p>Attention, pour les condensateurs des alimentations à découpage principalement, décharger les avant de les dessouder, pour éviter une désagréable châtaigne.
                    Il suffit d’attendre quelques heures après la coupure de l’alimentation de la carte, puis de court-circuiter avec l’extrémité d’un tournevis isolé les deux bornes
                    du condensateur avant de le dessouder.</p>
            </div>

        </div>
        <hr />




    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT']."/elements/footer.php"); ?>








<!-- JS Global Compulsory -->
<script type="text/javascript" src="/assets/custom/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/assets/custom/js/modernizr.custom.js"></script>
<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="/assets/custom/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="/assets/custom/js/modernizr.js"></script>
<script type="text/javascript" src="/assets/custom/js/jquery.cslider.js"></script>
<script type="text/javascript" src="/assets/custom/js/back-to-top.js"></script>
<script type="text/javascript" src="/assets/custom/js/jquery.sticky.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="/assets/custom/js/app.js"></script>
<script type="text/javascript" src="/assets/custom/js/index.js"></script>


<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initSliders();
        Index.initParallaxSlider();
    });
</script>

</body>
</html>