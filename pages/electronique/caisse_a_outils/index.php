<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Caisse à outil électronique shfnet">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <title>Caisse à outil</title>
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
        <h1 class="title"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Caisse à outil</h1>

        <div class="row minimenu">
            <div class="col-md-6 col-md-offset-3">

                <div class="list-group">
                    <a href="recup_composants.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Récupération des composants</h4>
                        <p class="list-group-item-text">Economisez et ayez toujours un stock de pièces de rechange.</p>
                    </a>
                    <a href="brochage_composants.php" class="list-group-item ">
                        <h4 class="list-group-item-heading">Brochage des composants</h4>
                        <p class="list-group-item-text">Vous oubliez tout le temps de sens de branchement de ce
                            transistor ?</p>
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