<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="shfnet theorie commutateur interrupteur">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <title>Commutateurs</title>
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
      <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


      <div class="container">
          <div class="article">

              <h1 class="title"><i class="fa fa-toggle-on"></i>  Commutateurs</h1>

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
              <!-- Type de commutation -->
              <div class="row paragraph">
                  <div class="col-md-6 ptext">
                      <h3 id="type">Type de commutation </h3>
                      <p>Les types de commutations peuvent être désignés sous plusieurs apellations et sont de deux type : permanents ou momentanés (bouton-poussoir). </p>
                          <ul>
                              <li><b>Marche ou ON ou à accrochage ou Activé : </b>entrée et sortie reliée, contact maintenu.</li>
                              <li><b>(Marche) ou (arrêt) ou Momentané ou (On) ou « On  :</b> entrée et sortie reliée, contact non maintenu (bouton-poussoir de sonnette)</li>
                              <li><b>Off ou Neutre ou arrêt : </b> entrée et sortie non reliée</li>
                          </ul>

                  </div>
                  <div class="col-md-6 pimage">
                      <img class="img-responsive" src="img/commutateurs/type_commutation.png" alt="type commutation interrupteur">
                  </div>
              </div>
              <hr />
              <!-- Configuration de contacts -->
              <div class="row">
                  <div class="col-md-6 pimage">
                      <img class="img-responsive" src="img/commutateurs/configuration_contact.png" alt="Configuration de contacts interrupteur">
                  </div>
                  <div class="col-md-6 ptext">
                      <h3 id="configuration">Configuration de contacts</h3>
                      <p>Les types de contact sont appelés RT : repos travail, et désignent le nombre de circuits indépendants disponibles. Par exemple, 2RT est équivalent à
                          deux interrupteurs en parallèle.</p>
                      <ul>
                          <li><b>Pole (pôle) :</b> nombre d'ensembles de contacts.</li>
                          <li><b>Throw :</b> nombre de positions de contact, simple ou double.</li>
                      </ul>
                      <p>Par exemple : </p>
                      <ul>
                          <li><b>SPST :</b> simple Pole simple throw</li>
                          <li><b>SPDT :</b> simple Pole double Throw (inverseur simple)</li>
                          <li><b>QPDT :</b> quadruple Pole double Throw</li>
                          <li><b>1P12T :</b>  1 pole 12 Throw (interrupteur rotatif à 12 positions)</li>
                      </ul>
                  </div>
              </div>

              <hr />
              <!-- Caractéristiques électriques -->
              <div class="row paragraph">
                  <div class="col-md-6 ptext">
                      <h3 id="electrique">Caractéristiques électriques </h3>
                      <p>Courant maximal et tension maximale. </p>
                      <ul>
                          <li><b>Courant maximal : </b>Il ne faut jamais dépasser le courant maximal admis, et il est préférable de prévoir une large marge, cela évitera les
                              claquements au niveau des contacts et prolongera la longévité du commutateur. </li>
                          <li><b>Tension maximale  :</b> Il faut également prévoir une marge sur la tension maximale et vérifier si l’interrupteur est conforme aux normes s'il
                              doit être utilisé avec la tension du secteur. </li>
                      </ul>

                  </div>
                  <div class="col-md-6 pimage">
                      <img class="img-responsive" src="img/commutateurs/caracteristiques_electriques.png" alt="caracteristiques electriques">
                  </div>
              </div>
              <hr />
              <!-- Caractéristiques mécaniques -->
              <div class="row">
                  <div class="col-md-6 pimage">
                      <img class="img-responsive" src="img/commutateurs/caracteristiques_mecaniques.png" alt="caracteristiques mecaniques">
                  </div>
                  <div class="col-md-6 ptext">
                      <h3 id="mecanique">Caractéristiques mécaniques</h3>
                      <p>Commutateur à glissière, à bascule, rotatif ; étanchéité...  </p>
                      <p>On choisis un commutateur en fonction de son environnement d’utilisation.
                          Sa fréquence d’utilisation déterminera sa robustesse. Son milieu d’utilisation déterminera aussi l’utilisation (extérieur, milieu ATEX, milieu agressif).
                          Il faut toujours regarder la datasheet du constructeur, et les schémas de contact s’ils sont présents, car les informations des vendeurs sont souvent vagues et parfois trompeuses, même chez des vendeurs sérieux comme RS. Surtout lorsque la configuration est un peu spéciale.
                      </p>
                  </div>
              </div>
              <hr />

              <!-- Interrupteurs spéciaux -->
              <div class="row paragraph">
                  <div class="col-md-6 ptext">
                      <h3 id="electrique">Interrupteurs spéciaux </h3>
                      <p>Interrupteurs ILS, DIL, à clé, à mercure, à flotteur... </p>

                  </div>
                  <div class="col-md-6 pimage">
                      <!--<img class="img-responsive" src="img/commutateurs/caracteristiques_electriques.png" alt="caracteristiques electriques">-->
                  </div>
              </div>
              <hr />

          </div>
      </div>

      <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>

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