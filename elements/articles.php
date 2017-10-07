<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions
?>


        <div class="services">
			<div class="container">
                <h3 class="title">Les derniers articles publiés sur le site</h3>
				<div class="row">

                    <?php
                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                    $bdd = connexionDB();
                    if (isset($bdd)) {
                            $articles = getLastArticles($bdd, 4);
                            foreach ($articles as $article) {
                                ?>
                                <div class="col-md-3">
                                    <img src="<?php echo $article['img'] ?>"
                                         class="" title="<?php echo $article['legend'] ?>">
                                    <h3><a class="hover-effect"
                                           href="/blog.php?a=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
                                    </h3>
                                    <h3 class="post-subtitle">
                                        <?php echo $article['subtitle']; ?>
                                    </h3>
                                    <p class="post-meta">Posté par <a
                                                href="/portfolio/index.php"> <?php echo $article['author']; ?> </a> <?php $date = strtotime($article['date_article']);
                                        echo "Le " . date("d-m-Y", $date) . " à " . date("H:i", $date); ?></p>
                                </div>
                                <?php
                            }
                        }
                    else {
                        echo 'Désolé ! Problème de communication avec la base de donnée';
                    }
                    ?>
                    </div>
				 </div>	
			</div>

		

		

    