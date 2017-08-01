<?php include($_SERVER['DOCUMENT_ROOT']."/admin/elements/header.php");
require_once '../includes/functions.php'; // fichier des fonctions
require_once '../includes/articles.php'; // fichier des fonctions
?>
    <!-- Include Bootstrap Datepicker -->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css'>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>
            <h2 class="sub-header">Insertion d'un article</h2>

            <div class="container">
                <div class="row">
                    <div class="form-group" >
                    <form enctype="multipart/form-data" action="../includes/insert.php" method="post">
                        <label for="title">Titre :</label>  <input type="text" name="title" id="title" class="form-control"/><br />
                        <label for="subtitle">Sous-titre :</label>  <input type="text" name="subtitle" id="subtitle" class="form-control"/><br />
                        <label for="categorie">Catégorie :</label>
                        <select name="categorie" id="categorie" class="form-control">
                            <?php
                            foreach($ListeCategories as $categorie)
                            {
                                ?>
                                <option value="<?php echo $categorie['id'] ?>"><?php echo $categorie['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select><br />
                        <label for="contenu">Contenu :</label> <textarea name="contenu" id="contenu" rows="10" cols="50" class="form-control"> Contenu de l'article</textarea><br />

                        <label for="date">Date :</label>
                        <div class=" date">
                            <div id="embeddingDatePicker"></div>
                            <input type="hidden" id="date" name="date" />
                        </div>
                        <div class ="row">
                            <div class="col-sm-3">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                            <div class="col-sm-9"></div>
                        </div><br />

                        <label for="auteur">Auteur :</label>  <input type="text" name="auteur" id="auteur" class="form-control"/><br />

                        <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                        <label for="fic">Image :</label>
                        <input type="file" name="fic" size=50 /> <br />
                        <label for="legende">Legende :</label>  <input type="text" name="legende" id="legende" class="form-control"/><br />
                        <input type="submit" value="Envoyer" class="btn btn-primary"/>
                    </form>
                    </div>

                </div>
            </div>
        </div>

<?php include($_SERVER['DOCUMENT_ROOT']."/admin/elements/footer.php"); ?>

<script> $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
