<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="blog électronique informatique">
      <meta name="author" content="Pierre-Frédérick DENYS">
      <title>SHFNET</title>
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
        <link rel="shortcut icon" href="/img/favicon.ico"> <script src="https://use.fontawesome.com/da91765651.js"></script>
  </head>

  <body>


          <?php include($_SERVER['DOCUMENT_ROOT']."/elements/header.php"); ?>
          <?php include($_SERVER['DOCUMENT_ROOT']."/elements/banner.php"); ?>
          <?php include($_SERVER['DOCUMENT_ROOT']."/elements/aside.php"); ?>
          <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/articles.php"); ?>
          <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/projects.php"); ?>
          <?php include($_SERVER['DOCUMENT_ROOT'] ."/elements/citation.php"); ?>
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