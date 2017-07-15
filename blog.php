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
    <link rel="shortcut icon" href="/img/favicon.ico">
</head>

<body>
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


        <div class="container">
            <div class="row">
                <h1>Blog</h1>
            <ul>
                <?php
                    foreach($ListeCategories as $categorie) { ?>
                            <li>
                                <a href="blog.php?c=<?php echo $categorie['name']; ?>"><?php echo $categorie['name']; ?></a>
                            </li>
                                <?php
                    } ?>
                        </ul>


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
                            <div class="post-preview">
                    <a href="blog.php?a=<?php echo $article['id'];?>">
                                    <h2 class="post-title">
                            <?php echo $article['title']; ?>
                                    </h2>
                                    <h3 class="post-subtitle">
                            <?php echo $article['subtitle']; ?>
                                    </h3>
                                </a>
                        <p class="post-meta">Posté par <a href="#"> <?php echo $article['author']; ?> </a> le  <?php $date = new DateTime($article['date']); echo strftime("%e %B %Y", $date->getTimestamp()); ?></p>
                            </div>
                    <hr>
                    <?php
                    }
                    ?>

                <ul>
                <?php if($page > 1) { ?>
                    <li class="previous">
                        <a href="<?php if($getCategorie == null) echo 'blog.php?p='.($page-1); else echo '?c='.$getCategorie.'&p='.($page-1); ?>" >&larr; New</a>
                    </li>
                <?php } ?>
                    <li class="next">
                         <a href="<?php if($getCategorie == null) echo 'blog.php?p='.($page+1); else echo '?c='.$getCategorie.'&p='.($page+1); ?>" >Old &rarr;</a>
                    </li>
                </ul>

                    <?php
                }
                ?>
            </div>
        </div>
</body>
</html>


