<?php 
require_once 'includes/functions.php'; // fichier des fonctions
require_once 'includes/articles.php'; // fichier des fonctions
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="blog électronique informatique">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <?php
    foreach($metas as $meta=>$value)
    {
        if(strpos($meta, 'og:') === 0)
            $type = 'property';
        else
            $type = 'name';
        echo '    <meta '.$type.'="'.$meta.'" content="'.$value."\">\n";
    }
    ?>
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
    <link rel="stylesheet" href="/assets/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css">

    <!-- Custom styles for this template -->

    <link href="/assets/custom/css/business-plate.css" rel="stylesheet">
    <link href="/assets/custom/css/shfnet.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/favicon.ico"> <script src="https://use.fontawesome.com/da91765651.js"></script>
</head>

<body>
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


        <div class="container">
            <div class="row">
                <h1 class="title">Blog</h1>
                Catégorie :
                <div class="btn-group" role="group" aria-label="categorie">
                <?php
                    foreach($ListeCategories as $categorie) { ?>
                            <a class="btn btn-default" href="blog.php?c=<?php echo $categorie['name']; ?>"><?php echo $categorie['name']; ?></a>
                                <?php
                    } ?>
                </div>

                <hr>
                <?php
                if(isset($_GET['a']))
                {
                    echo $article['contenu'];
                }
                else
                {
                    $articles = LastArticles($bdd, $idCategorie, $page);
                    foreach($articles as $article)
                    {
                    ?>
                            <div class="post-preview row">
                                <div class="col-md-3">
                                    <img src="<?php echo "/upload/" . $article['categorie'] . "/" .$article['url'] ?>" class="" title="<?php echo $article['url'] ?>">
                                </div>
                                <div class="col-md-9">
                    <a href="blog.php?a=<?php echo $article['id'];?>">
                                    <h2 class="post-title">
                            <?php echo $article['title']; ?>
                                    </h2>
                                    <h3 class="post-subtitle">
                            <?php echo $article['subtitle']; ?>
                                    </h3>
                                </a>
                        <p class="post-meta">Posté par <a href="#"> <?php echo $article['author']; ?> </a> le  <?php $date = strtotime($article['date']); echo "Le " . date("d-m-Y", $date) . " à " . date("H:i", $date) ; ?></p>

                                </div>
                            </div>
                    <hr>
                    <?php
                    }
                    ?>

                <nav aria-label="navigation">
                    <ul class="pager">
                <?php if($page > 1) { ?>
                    <li class="previous">
                        <a href="<?php if($getCategorie == null) echo 'blog.php?p='.($page-1); else echo '?c='.$getCategorie.'&p='.($page-1); ?>" ><span aria-hidden="true">&larr;</span> Newer posts</a>
                    </li>
                <?php } ?>
                    <li class="next">
                         <a href="<?php if($getCategorie == null) echo 'blog.php?p='.($page+1); else echo '?c='.$getCategorie.'&p='.($page+1); ?>" >Older Posts <span aria-hidden="true">&rarr;</span></a>
                    </li>

                    </ul>
                </nav>
                    <?php
                }
                ?>

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


