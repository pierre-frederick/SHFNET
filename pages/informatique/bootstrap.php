<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap HTML site web">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <title>Bootstrap</title>
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
    <link rel="shortcut icon" href="/img/favicon.ico"> <script src="https://use.fontawesome.com/da91765651.js"></script>
    <script src="https://use.fontawesome.com/da91765651.js"></script>

</head>



<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/elements/header.php"); ?>


<div class="container">
    <div class="article">
        <h1 class="title"><i class="glyphicon glyphicon-bookmark"></i>   Bootstrap</h1>


        <div class="row introduction">
            <div class="col-md-12 content">
                <div class="row">

                    <p><b>Icônes :  </b> moteur de recherche d'icônes <a href="https://glyphsearch.com/" target="_blank">ici</a>

                    <hr />
                    
<!-- DROPDOWN -->
                    <p><b>Dropdown :  </b> élément déroulant vers le bas pouvant être vers le haut avec <code class="language-css">class="dropup"</code>  au lieu de <code class="language-css">class="dropdown"</code> </p>
                    <div class="row">
                        <div class="col-md-8">
                            <pre><code class="language-html">
&lt;div class="dropdown"&gt;
    &lt;button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"&gt;
        Dropdown
        &lt;span class="caret"&gt;&lt;/span&gt;
    &lt;/button&gt;
    &lt;ul class="dropdown-menu" aria-labelledby="dropdownMenu1"&gt;
        &lt;li class="dropdown-header"&gt;Dropdown header&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;Action&lt;/a&gt;&lt;/li&gt;
        &lt;li class="disabled"&gt;&lt;a href="#"&gt;Another action&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;Something else here&lt;/a&gt;&lt;/li&gt;
        &lt;li role="separator" class="divider"&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;Separated link&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;
                                </code></pre>
                        </div>
                        <div class="col-md-4">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Dropdown
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li class="dropdown-header">Dropdown header</li>
                                    <li><a href="#">Action</a></li>
                                    <li class="disabled"><a href="#">Another action</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
<!-- END DROPDOWN -->





















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