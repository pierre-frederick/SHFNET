<?php 
require_once '../includes/functions.php'; // fichier des fonctions
require_once '../includes/articles.php'; // fichier des fonctions
?>

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
    <link rel="stylesheet" href="/assets/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css">

    <!-- Custom styles for this template -->

    <link href="/assets/custom/css/business-plate.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/favicon.ico"> <script src="https://use.fontawesome.com/da91765651.js"></script>
    <!-- Include Bootstrap Datepicker -->
    <link rel='stylesheet prefetch' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css'>
    <link rel='stylesheet prefetch' href='//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>


</head>

<body>
<div class="container">
    <div class="row">
        <h3>Insertion d'un article</h3>
      <form enctype="multipart/form-data" action="../includes/insert.php" method="post">
          <label for="title">Titre :</label>  <input type="text" name="title" id="title" /><br />
          <label for="subtitle">Sous-titre :</label>  <input type="text" name="subtitle" id="subtitle" /><br />
          <label for="categorie">Catégorie :</label>
          <select name="categorie" id="categorie">
              <?php
              foreach($ListeCategories as $categorie)
              {
              ?>
              <option value="<?php echo $categorie['id'] ?>"><?php echo $categorie['name'] ?></option>
                  <?php
              }
              ?>
          </select><br />
          <label for="contenu">Contenu :</label> <textarea name="contenu" id="contenu" rows="10" cols="50"> Contenu de l'article</textarea><br />


              <div class=" date">
                  <div id="embeddingDatePicker"></div>
                  <input type="hidden" id="date" name="date" />
                </div>
          <div class='col-sm-3'>
              <div class='input-group date' id='datetimepicker1'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
              </div>
          </div> <br />


          <label for="auteur">Auteur :</label>  <input type="text" name="auteur" id="auteur" /><br />

          <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
          <label for="fic">Image :</label>
          <input type="file" name="fic" size=50 /> <br />
          <label for="legende">Legende :</label>  <input type="text" name="legende" id="legende" /><br />
         <input type="submit" value="Envoyer" />
      </form>



        <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js'></script>
        <script> $(function () {
                    $('#datetimepicker1').datetimepicker();
            });
        </script>
</body>
</html>


