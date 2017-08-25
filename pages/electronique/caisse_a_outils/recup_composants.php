<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Récupération composants dessoudage">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <title>Récupération composants</title>
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
        <h1 class="title">Récupération des composants</h1>

        <div class="row introduction">
            <div class="col-md-12">
                <h2>Choix des composants à récupérer</h2>
                <p>Il est souvent intéressant de récupérer des composants sur des cartes ou d’anciens montages, afin de
                    réaliser des prototypes, mais bien sûr pas de montage finaux.</p>
            </div>
        </div>

        <!-- Résistances -->
        <div class="row paragraph">
            <div class="col-md-8 ptext">
                <h3>Les résistances</h3>
                <p>Les résistances ne valent pas à être récupérés car leur valeur est faible, et les pattes sont coupées
                    très court, ce qui interdit leur réutilisation.
                    Eventuellement récupérer les résistances de puissance (>1W) qui sont souvent onéreuses si elles sont
                    en bon état. Toujours les tester à l’ohmmètre.</p>
            </div>
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/recup_resistances.jpg" alt="Récupération résistances">
            </div>
        </div>
        <hr/>
        <!-- Condensateurs -->
        <div class="row">
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/recup_condensateurs.jpg" alt="Récupération condensateurs">
            </div>
            <div class="col-md-8 ptext">
                <h3>Les condensateurs</h3>
                <p>Les condensateurs ne valent à être récupérés si leur valeur est assez importante (>470uF) et si leur
                    aspect est comme neuf. Les composants gonflés,
                    qui ont coulés, avec des traces de brûlé sont à proscrire. Tester leur valeur avec un
                    multimètre.</p>
                <p>Attention, pour les condensateurs des alimentations à découpage principalement, décharger les avant
                    de les dessouder, pour éviter une désagréable châtaigne.
                    Il suffit d’attendre quelques heures après la coupure de l’alimentation de la carte, puis de
                    court-circuiter avec l’extrémité d’un tournevis isolé les deux bornes
                    du condensateur avant de le dessouder.</p>
            </div>

        </div>
        <hr/>
        <!-- Circuits intégrés -->
        <div class="row">
            <div class="col-md-8">
                <h3>Les circuits intégrés</h3>
                <p>Pour les circuits intégrés, ils sont faciles à récupérer s’ils sont sur des supports tulipes, sinon,
                    le dessoudage les endommage fortement, même avec les bons outils.
                    Vérifier leur aspect (composant qui a chauffé, gonflé, pattes tordues), et tester les avec un
                    montage dont le fonctionnement est facile à vérifier.
                    En général, il est peu recommandé de récupérer ce genre de composant, pour éviter de nombreux
                    problèmes de débogage de prototype.</p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_ci.jpg" alt="Récupération circuits intégrés">
            </div>
        </div>
        <hr/>

        <!-- Régulateurs et transistors -->
        <div class="row">
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_trans_reg.jpg" alt="Récupération régulateurs transistors">
            </div>
            <div class="col-md-8">
                <h3>Régulateurs et transistors</h3>
                <p>Pour les régulateurs et transistors en boitier TO-3 ou TO-220, il est facile de récupérer les
                    radiateurs (penser à les nettoyer et remettre de la pâte thermique
                    avant de les réutiliser). Le dessoudage de ces composants est facile (ne pas les chauffer trop
                    longtemps).</p>
            </div>
        </div>
        <hr/>

        <!-- Connectique -->
        <div class="row">
            <div class="col-md-8">
                <h3>Connectique</h3>
                <p>Pour les connecteurs sur CI, a moins d’avoir une pompe à vide et une panne adaptée, il est difficile
                    de récupérer ces composants sans les abîmer.
                    N’hésitez pas à récupérer les interrupteurs, boutons, fusibles qui peuvent être couteux à l’achat,
                    et facilement récupérables.</p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_con.jpg" alt="Récupération connectique">
            </div>
        </div>
        <hr/>

        <!-- Potentiomètres -->
        <div class="row">
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_potar.jpg" alt="Récupération potentiomètres">
            </div>
            <div class="col-md-8">
                <h3>Potentiomètres</h3>
                <p>Pour les potentiomètres, vérifier qu’ils sont en bon état, et après dessoudage, contrôler la course
                    avec un ohmmètre pour vérifier qu’il ne « crache » pas, et la courbe (log ou linéaire).
                </p>
            </div>
        </div>
        <hr/>

        <!-- Relais -->
        <div class="row">
            <div class="col-md-8">
                <h3>Relais</h3>
                <p>Les relais sont récupérables, il suffit de contrôler que la bobine n’est pas en fin de vie (boitier
                    qui a chauffé, traces marrons).</p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_relais.jpg" alt="Récupération relais">
            </div>
        </div>
        <hr/>

        <!-- câbles -->
        <div class="row">
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_fil.jpg" alt="Récupération fils">
            </div>
            <div class="col-md-8">
                <h3>Fils et visserie</h3>
                <p>Récupérer également la visserie et les câbles sur les alimentations de PC par exemple, car ils sont
                    en cuivre, et leur longueur permet de s’en servir à câbler des coffrets à moindre coût.</p>
            </div>
        </div>
        <hr/>

        <!-- Partie 2 dessoudage -->
        <div class="row introduction">
            <div class="col-md-12">
                <h2>Dessoudage</h2>
                <p>Voici les différentes techniques et les outils à utiliser pour dessouder les composants dans de
                    bonnes conditions. Voir la page <a href="recup_composants.php">choix matériel</a> pour bien choisir
                    ses outils. </p>
            </div>
        </div>

        <!-- Avec un fer -->
        <div class="row">
            <div class="col-md-8">
                <h3>Avec un fer à souder</h3>
                <p>Chauffer avec la panne du fer à souder, les pattes du composant à souder, puis tirer avec une pince
                    brucelles ou un tournevis.</p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_au_fer.gif" alt="Récupération au fer">
            </div>
        </div>
        <hr/>

        <!-- Avec une pompe -->
        <div class="row">
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_pompe.gif" alt="Récupération à la pompe">
            </div>
            <div class="col-md-8">
                <h3>Avec une pompe à dessouder</h3>
                <p>Pour les composants avec plusieurs pattes qui ne peuvent pas être chauffées simultanément, il faut
                    enlever la soudure avec une pompe à dessouder.
                    (chauffer le point de soudure avec le fer, puis très rapidement aspirer la soudure avec la
                    pompe).</p>
                <p>Une autre solution est d’utiliser l’aspiration mécanique, soit avec un fer à dessouder, soit avec une
                    pompe à vide qui fonctionnera comme la pompe manuelle, mais beaucoup plus efficacement.</p>
            </div>

        </div>
        <hr/>

        <!-- Avec de la tresse -->
        <div class="row">
            <div class="col-md-8">
                <h3>Avec de la tresse à dessouder</h3>
                <p>La tresse à dessouder, permet d'éliminer toute la soudure par capillarité. Poser la tresse sur le
                    point de soudure, et appuyer avec la panne du fer sur la tresse, jusqu'à ce que la soudure
                    fonde et s'étale sur la tresse. <br/>
                    Dés que le bout de la tresse est saturée, couper le morceau et utiliser le nouveau bout.</p>
            </div>
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_tresse.gif" alt="Récupération à la tresse">
            </div>
        </div>
        <hr/>

        <!-- décapeur thermique -->
        <div class="row">
            <div class="col-md-4">
                <img class="img-responsive" src="img/recup_decap.gif" alt="Récupération décapeur">
            </div>
            <div class="col-md-8">
                <h3>Avec un décapeur thermique</h3>
                <p>On peut également utiliser un décapeur thermique, mais seulement pour les gros composants comme les
                    interrupteurs, câbles…</p>
                <p>Il faut alors bien régler la température et faire quelques essai afin de trouver le bon temps de
                    chauffe. </p>
            </div>

        </div>

    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>