<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/functions.php'; // fichier des fonctions
require_once  $_SERVER['DOCUMENT_ROOT'].'/includes/articles.php'; // fichier des fonctions
?>

    <!-- footerTopSection -->
    <div class="footerTopSection">
		<div class="container">
			<div class="row">
			  <div class="col-md-3">
				<h3>About </h3>
				<p>Le blog d'un passionné d'info et d'électronique. <a href="/portfolio/">A propos de moi</a>
				</p>
				
				<h3>Newsletter</h3>
				<p>Si vous souhaitez être avertis des nouveaux articles sur le site</p>
				<div>
					<form class="form-inline" role="form">
					  <div class="form-group">
						<label class="sr-only" for="exampleInputEmail2">Email </label>
						<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
					  </div>
					  <button type="submit" class="btn btn-brand">S'inscrire</button>
					</form>
				</div>
				
			  </div>
			  <div class="col-md-3">
				<h3>Recent NEWS </h3>






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
                            <p>
                              <strong><a class="hover-effect" href="/blog.php?a=<?php echo $article['id'];?>"><?php echo $article['title']; ?></a></strong><br>
                                  <?php echo $article['subtitle']; ?>
                          </p>
                          <?php
                      }
                  }
                  ?>
			  </div>
			  <div class="col-md-3">
				<h3>Plan du site</h3>
                  <ul>
                      <li><a href="/index.php">Accueil</a></li>
                      <li><a href="/pages/electronique/elec.php">Electronique</a></li>
                      <li><a href="/pages/informatique/info.php">Informatique</a></li>
                      <li><a href="/pages/services.php">Services</a></li>
                      <li><a href="/pages/voyages.php">Voyages</a></li>
                      <li><a href="/blog.php">Blog</a></li>
                      <li><a href="/pages/contact.php">Contact</a></li>
                  </ul>
				
			  </div>
			  <div class="col-md-3">
				<h3>Contact</h3>
				<p>
					<strong>SHFNET</strong><br>

					M : contact@shfnet.fr<br>
					W :	shfnet.fr<br>
				</p>
				<h3>Stay Connected</h3>
				<p>social networks
				</p>

			  </div>
			</div>
		</div>
	</div>
    <!-- footerBottomSection -->	
	<div class="footerBottomSection">
		<div class="container">
			&copy; SHFNET, 2017 <a href="/pages/conditions.php">Terms and Condition</a> | <a href="/pages/policy.php">Privacy Policy</a>
			<div class="pull-right"> <a href="/index.php"><img src="/img/logo_shfnet_footer.png" width = 100 alt="Logo SHFNET" /></a></div>
		</div>
	</div>