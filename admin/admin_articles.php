<?php
$active="article";
include($_SERVER['DOCUMENT_ROOT']."/admin/elements/header.php");
require_once '../includes/functions.php'; // fichier des fonctions
require_once '../includes/articles.php'; // fichier des fonctions
?>
    <!-- Include Bootstrap Datepicker -->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css'>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>

            <div class="container">
                <h2 class="sub-header">Insertion d'un article</h2>
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

            <h2 class="sub-header">Liste des articles</h2>
                <div class="row">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Titre</th>
                            <th>Sous-Titre</th>
                            <th>Catégorie</th>
                            <th>Image</th>
                            <th>Légende</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $articles = LastArticles($bdd, $idCategorie, $page, 50);
                        foreach ($articles as $article){ ?>
                        <tr>
                            <th><?php echo $article['id'] ?></th>
                            <th><?php $date = strtotime($article['date']); echo "Le " . date("d-m-Y", $date) . " à " . date("H:i", $date) ; ?></th>
                            <th><?php echo $article['title'] ?></th>
                            <th><?php echo $article['subtitle'] ?></th>
                            <th>Catégorie</th>
                            <th><?php echo "/upload/articles/" . $article['categorie'] . "/" .$article['img'] ?></th>
                            <th><?php echo $article['legend'] ?></th>
                            <th><a data-toggle="modal" data-target="#edit" class="btn btn-link btn-sm" onclick="MakeModal(<?php echo $article['id']; ?>);"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></th>
                            <th><a href="admin.php"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a> </th>
                        </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div id="edit" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Editer un article</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group" >
                                        <form enctype="multipart/form-data" action="../includes/insert.php" method="post">
                                            <label for="title">Titre :</label>  <input type="text" name="title" id="titlemodal" class="form-control" value=""/><br />
                                            <label for="subtitle">Sous-titre :</label>  <input type="text" name="subtitle" id="subtitlemodal" class="form-control"/><br />
                                            <!--<label for="categorie">Catégorie :</label>
                                            <select name="categorie" id="categoriemodal" class="form-control">
                                                <?php /*
                                                    foreach($ListeCategories as $categorie)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $categorie['id'] ?>"><?php echo $categorie['name'] ?></option>
                                                        <?php
                                                    } */
                                                ?>
                                            </select><br /> -->
                                            <label for="contenu">Contenu :</label> <textarea name="contenu" id="contenumodal" rows="10" cols="50" class="form-control"> Contenu de l'article</textarea><br />

                                            <label for="auteur">Auteur :</label>  <input type="text" name="auteur" id="auteurmodal" class="form-control"/><br />

                                           <!-- <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                                            <label for="fic">Image :</label>
                                            <input type="file" name="fic" size=50 /> <br /> -->
                                            <label for="legende">Legende :</label>  <input type="text" name="legende" id="legendemodal" class="form-control"/><br />
                                            <input type="submit" value="Envoyer" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer" id="fabFoot">
                            </div>

                        </div>
                    </div>





                </div>
        </div>

<?php include($_SERVER['DOCUMENT_ROOT']."/admin/elements/footer.php"); ?>

<script> $(function () {
        $('#datetimepicker1').datetimepicker();
    });

    var liste = [];
    <?php
    foreach($articles as $article)
    {
        echo 'liste['.$article['id'].'] = {contenu: \''.str_replace("\r\n", '<br/>', $article['contenu']).'\', title: \''.$article['title'].'\', subtitle: \''.$article['subtitle'].'\', auteur: \''.$article['author'].'\', legende: \''.$article['legend'].'\'};';
    }
    ?>


    function MakeModal(id)
    {
        $("#titlemodal").val(liste[id]['title']);
        $("#subtitlemodal").val(liste[id]['subtitle']);
        $("#contenumodal").val(liste[id]['contenu']);
        $("#auteurmodal").val(liste[id]['auteur']);
        $("#legendemodal").val(liste[id]['legende']);

        $("#fabFoot").html('<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>');
    }

</script>
