<?php
require_once '/includes/functions.php'; // fichier des fonctions
require_once '/includes/articles.php'; // fichier des fonctions
?>


        <div class="services">
			<div class="container">
                <h3 class="title">Les derniers articles publiés sur le site</h3>
				<div class="row">

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
                            <div class="col-md-3">
                                <img src="<?php echo "/upload/" . $article['categorie'] . "/" .$article['url'] ?>" class="" title="project one">
                                    <h3><a class="hover-effect" href="/blog.php?a=<?php echo $article['id'];?>"><?php echo $article['title']; ?></a></h3>
                                    <h3 class="post-subtitle">
                                        <?php echo $article['subtitle']; ?>
                                    </h3>
                                <p class="post-meta">Posté par <a href="/pages/apropos.php"> <?php echo $article['author']; ?> </a> <?php $date = strtotime($article['date']); echo "Le " . date("d-m-Y", $date) . " à " . date("H:i", $date) ; ?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    </div>
				 </div>	
			</div>

		

		

    