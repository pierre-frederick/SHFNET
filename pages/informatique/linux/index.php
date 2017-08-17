<!DOCTYPE html>
                  <html lang="fr">
                  <head>
                      <meta charset="utf-8">
                      <meta http-equiv="X-UA-Compatible" content="IE=edge">
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">
                      <meta name="description" content="shfnet linux debian logiciels libre">
                      <meta name="author" content="Pierre-Frédérick DENYS">
                      <title>Linux</title>
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
                      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css">    <!-- https://glyphsearch.com/?query=infinity  -->
                      <!-- CSS Template -->
                      <link href="/assets/custom/css/business-plate.css" rel="stylesheet">
                      <!-- Custom styles -->
                      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" >
                      <link href="/assets/custom/css/shfnet.css" rel="stylesheet">
                      <link rel="shortcut icon" href="/img/favicon.ico"> <script src="https://use.fontawesome.com/da91765651.js"></script>
                  </head>



                  <body>
                  <?php include($_SERVER['DOCUMENT_ROOT']."/elements/header.php"); ?>


                  <div class="container">
                      <div class="article">
                          <h1 class="title"><i class="fa fa-linux"></i>   Linux</h1>

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
                                  </div>
                                  <h2>Distributions</h2>
                                  <div class="list-group">
                                      <a href="linux_distributions.php" class="list-group-item">
                                          <h4 class="list-group-item-heading">Distribution Debian</h4>
                                          <p class="list-group-item-text">Découvrez le système d'exploitation universel.</p>
                                      </a>
                                  </div>




                              </div>
                          </div>

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