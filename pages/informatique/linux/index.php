<?php
$pageArray = array();
$pageArray['title']= "Linux";
$pageArray['description']= "Linux";
$pageArray['image']= "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT']."/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/elements/header.php"); ?>

<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-linux"></i>    <?php echo $pageArray['title'] ?></h1>

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
                  <a href="sauvegarde.php" class="list-group-item">
                      <h4 class="list-group-item-heading">Sauvegarde</h4>
                      <p class="list-group-item-text">Sauvegarde de données et système.</p>
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