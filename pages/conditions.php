<?php 
require_once 'includes/functions.php'; // fichier des fonctions
require_once 'includes/projects.php'; // fichier des fonctions
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <title>Articles SHFNET</title>

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
                <ul>
                    <li>
                        <a href="./">Accueil</a>
                    </li>
				    <?php
				    foreach($ListeCategories as $categorie)
				    {
				    	?>
					<li>
					    <a href="./?c=<?php echo $categorie['name']; ?>"><?php echo $categorie['name']; ?></a>
					</li>
				    	<?php
				    }
				    ?>
                </ul>
                        <?php echo $header['title']; ?>
                 


    

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
			<a href="./?a=<?php echo $article['id'];?>">
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
				<a href="<?php if($getCategorie == null) echo './?p='.($page-1); else echo '?c='.$getCategorie.'&p='.($page-1); ?>" >&larr; New</a>
            </li>
		<?php } ?>
            <li class="next">
		         <a href="<?php if($getCategorie == null) echo './?p='.($page+1); else echo '?c='.$getCategorie.'&p='.($page+1); ?>" >Old &rarr;</a>
            </li>
        </ul>

			<?php
		}
		?>
    

</body>
</html>


