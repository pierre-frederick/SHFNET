<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/articles.php'; // fichier des fonctions
$active = "article";
?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "admin/elements/head.php"); ?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="/admin/assets/js/gijgo.js" type="text/javascript"></script>
<link href="/admin/assets/css/gijgo.css" rel="stylesheet" type="text/css" />

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include($_SERVER['DOCUMENT_ROOT'] . "admin/elements/nav.php"); ?>


<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Gestion site web</li>
            <li class="breadcrumb-item active">Banners</li>
            <li class="breadcrumb-item ">Add</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Ajouter une bannière</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="/admin/banners/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i>
                        Back</a>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <form enctype="multipart/form-data" action="../../includes/insert.php" method="post">
                            <label for="title">Titre :</label> <input type="text" name="title" id="title"
                                                                      class="form-control"/><br/>
                            <label for="subtitle">Sous-titre :</label> <input type="text" name="subtitle" id="subtitle"
                                                                              class="form-control"/><br/>
                            <label for="categorie">Catégorie :</label>
                            <select name="categorie" id="categorie" class="form-control">
                                <?php
                                foreach ($ListeCategories as $categorie) {
                                    ?>
                                    <option value="<?php echo $categorie['id'] ?>"><?php echo $categorie['name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select><br/>
                            <label for="contenu">Contenu :</label> <textarea name="contenu" id="contenu" rows="10"
                                                                             cols="50"
                                                                             class="form-control"> Contenu de l'article</textarea><br/>

                            <label for="date">Date :</label>

                            <input id="datepicker" width="276" />



                            <label for="auteur">Auteur :</label> <input type="text" name="auteur" id="auteur"
                                                                        class="form-control"/><br/>

                            <input type="hidden" name="MAX_FILE_SIZE" value="250000"/>
                            <label for="fic">Image :</label>
                            <input type="file" name="fic" size=50/> <br/>
                            <label for="legende">Legende :</label> <input type="text" name="legende" id="legende"
                                                                          class="form-control"/><br/>
                            <input type="submit" value="Envoyer" class="btn btn-primary"/>
                        </form>
                    </div>
                </div>
            </div>


        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome'
    });
</script>


<?php include($_SERVER['DOCUMENT_ROOT'] . "admin/elements/footer.php"); ?>

</body>
</html>