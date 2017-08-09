<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="shfnet domotique domoticz">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <title>Introduction Domoticz</title>
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
    <!-- Police utilisée -->
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <link href="/assets/custom/css/prism.css" rel="stylesheet" />
    <script src="/assets/custom/js/prism.js"></script>
    <link rel="shortcut icon" href="/img/favicon.ico">
    <script src="https://use.fontawesome.com/da91765651.js"></script>

</head>



<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/elements/header.php"); ?>

<div class="container">
    <div class="article">

        <h1 class="title"><i class="fa fa-toggle-on"></i>  Introduction à Domoticz</h1>

        <a href="index.php" class="btn btn-secondary">&larr; Retour au menu</a>

        <div class="row introduction">
            <div class="col-md-12">
                <h2>Introduction</h2>
                <p>Le choix d'un commutateur peut être compliqué si il doit répondre à des exigences précises ou si la configuration de contact est singulière. </p>
            </div>
        </div>
        <h2>Caractéristiques</h2>

        <div class="row menuarticle">
            <ul>
                <li><a href="#type">Type de commutation</a></li>
                <li><a href="#configuration">Configuration des contacts</a></li>
                <li><a href="#electrique">Caractéristiques électriques</a></li>
                <li><a href="#mecanique">Caractéristiques mécaniques</a></li>
            </ul>
        </div>

        <hr />
        <!-- RFXCOM -->
        <div class="row paragraph">
            <div class="col-md-6 ptext">
                <h3 id="rfxcom">RFXCOM </h3>

                <p>La solution la plus simple, mais aussi la plus onéreuse est d'utiliser le module prêt à l'emploi de RFXCOM.
                Il suffit de le connecter pour qu'il fonctionne. Il est vendu au prix de 110 euros.
                <br /><a href="http://www.rfxcom.com/epages/78165469.sf/en_GB/?ObjectPath=/Shops/78165469/Categories">Lien vers le site</a> </p>

                <ul>
                    <li><b>1</b></li>
                </ul>

            </div>
            <div class="col-md-6 pimage">
                <img class="img-responsive" src="img/commutateurs/type_commutation.png" alt="type commutation interrupteur">
            </div>
        </div>
        <hr />

        <!-- RFLink Nodo -->
        <div class="row">
            <div class="col-md-6 pimage">
                <img class="img-responsive" src="img/commutateurs/configuration_contact.png" alt="Configuration de contacts interrupteur">
            </div>
            <div class="col-md-6 ptext">
                <h3 id="rflink_nodo">RFLink </h3>
                <p>RFLink est l'alternative opensource qui fonctionne sur Arduino Mega. Développée par <a href="http://www.nodo-domotica.nl/">Nodo</a>,
                il est compatible avec la plupart des périphériques 433Hz et Domoticz.</p>
                <p>La carte de transmission RF peut être fabriquée comme dans le paragraphe suivant ou achetée
                    <a href="https://www.nodo-shop.nl/en/rflink-gateway/148-rflink-gateway-components.html">ici</a>
                pour environ 20 euros. Il faut également ajouter l'antenne a 8 euros <a href="https://www.nodo-shop.nl/en/antennes/102-antenne-433mhz-3dbi-sma-male-met-magneetvoet.html">ici</a> </p>
                <p>Le pack complet avec l'arduino et l'antenne est également disponible <a href="https://www.nodo-shop.nl/en/rflink-gateway/159-rflink-arduino-dipool.html">ici</a>
                 </p>


            </div>
        </div>

        <hr />
        <!-- RFLink DIY -->
        <div class="row paragraph">
            <div class="col-md-6 ptext">
                <h3 id="rflink_diy">RFLink DIY </h3>
                <p>Vous pouvez également construire le RFLink avec un arduino
                L'usage d'un arduino Méga est nécessaire car le programme à téléverser est très lourd</p>

                <ul>
                    <li><b>1</b></li>
                </ul>

            </div>
            <div class="col-md-6 pimage">
                <img class="img-responsive" src="img/commutateurs/type_commutation.png" alt="type commutation interrupteur">
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