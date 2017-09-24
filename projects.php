<?php
require_once 'includes/functions.php'; // fichier des fonctions
require_once 'includes/projects.php'; // fichier des fonctions
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="projets électronique informatique">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <?php
    foreach ($metas as $meta => $value) {
        if (strpos($meta, 'og:') === 0)
            $type = 'property';
        else
            $type = 'name';
        echo '    <meta ' . $type . '="' . $meta . '" content="' . $value . "\">\n";
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
    <script src="https://use.fontawesome.com/da91765651.js"></script>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


<div class="container">
    <div class="row">
        <h1 class="title">Projets <?php if (isset($_GET['s'])) {
                echo 'd\'' . $_GET['s'];
            } ?></h1>

        <?php
        if (isset($_GET['project'])) { ?>
            <a href="javascript:history.go(-1)" class="btn btn-outline-warning">&larr; Retour </a>


            <div class="row text-center">
                <h2 class="post-title">
                    <?php echo $project['title']; ?>
                </h2>
                <h3 class="post-subtitle">
                    <?php echo $project['subtitle']; ?>
                </h3>

                <div class="col-md-offset-2 col-md-8">
                    <img src="<?php echo "/upload/projects/" . $project['subject'] . "/" . $project['id_categorie'] . "/" . $project['img'] ?>"
                         class="" title="<?php echo $project['img'] ?>">
                </div>
            </div>

            <div class="row text-justify">
                <div class="col-md-offset-2 col-md-8 articletext">
                    <?php echo $project['contenu']; ?>
                </div>
            </div>


            <?php
        } else {
            ?>
            Catégorie :
            <div class="btn-group" role="group" aria-label="categorie">
                <?php
                foreach ($ListeCategoriesProjects as $categorie) { ?>
                    <a class="btn btn-default"
                       href="projects.php?<?php echo "s=" . $subject . "&c=" . $categorie['name']; ?>"><?php echo $categorie['name']; ?></a>
                    <?php
                } ?>
            </div>
            <hr>


            <?php
            $projects = getLastProjects($bdd, $subject, $idCategorie, $page);
            foreach ($projects as $project) {
                ?>
                <div class="post-preview row">
                    <div class="col-md-3">
                        <img src="<?php echo "/upload/projects/" . $subject . "/" . $project['id_categorie'] . "/" . $project['img'] ?>"
                             class="" title="<?php echo $project['img'] ?>">
                    </div>
                    <div class="col-md-9">
                        <a href="projects.php?project=<?php echo $project['id']; ?>">
                            <h2 class="post-title">
                                <?php echo $project['title']; ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?php echo $project['subtitle']; ?>
                            </h3>
                        </a>
                        <p class="post-meta">Posté le <?php $date = strtotime($project['date']);
                            echo "Le " . date("d-m-Y", $date) . " à " . date("H:i", $date); ?></p>

                    </div>
                </div>
                <hr>
                <?php
            }
            ?>

            <nav aria-label="navigation">
                <ul class="pager">
                    <?php if ($page > 1) { ?>
                        <li class="previous">
                            <a href="<?php if ($getCategorie == null) echo 'projects.php?s=' . $subject . '&p=' . ($page - 1); else echo 'projects.php?s=' . $subject . '?c=' . $getCategorie . '&p=' . ($page - 1); ?>"><span
                                        aria-hidden="true">&larr;</span> Newer posts</a>
                        </li>
                    <?php } ?>
                    <li class="next">
                        <a href="<?php if ($getCategorie == null) echo 'projects.php?s=' . $subject . '&p=' . ($page + 1); else echo 'projects.php?s=' . $subject . '?c=' . $getCategorie . '&p=' . ($page + 1); ?>">Older
                            Posts <span aria-hidden="true">&rarr;</span></a>
                    </li>

                </ul>
            </nav>
            <?php
        }
        ?>

    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>


