<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions
?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/head.php"); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/nav.php"); ?>


<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Gestion site web</li>
            <li class="breadcrumb-item">Articles</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Gestion des articles</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="/admin/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/admin/articles/add.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter
                        un article</a>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <br>
                    <!-- ARTICLES -->
                    <div class="card mb-12">
                        <div class="card-header">
                            Articles
                        </div>
                        <?php if (isset($_GET['alert'])) {?>

                            <?php echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Succès !  </strong>". $_GET['alert'] . "</div>";
                        } ?>

                        <div id="divActArt" class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titre</th>
                                        <th>Sous-titre</th>
                                        <th>Auteur</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Légende</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                                    $bdd = connexionDB();
                                    if (isset($bdd)) {
                                        $articles = getAllArticle($bdd);
                                        if (!empty($articles)) {
                                            foreach ($articles as $article) { ?>
                                                <tr>
                                                    <td><?php echo $article['id'] ?></td>
                                                    <td><?php echo $article['title'] ?></td>
                                                    <td><?php echo $article['subtitle'] ?></td>
                                                    <td><?php echo $article['author'] ?></td>
                                                    <td><?php $date = strtotime($article['date_article']);
                                                        echo "Le " . date("d-m-Y", $date) . " à " . date("H:i", $date); ?></td>
                                                    <td><?php echo $article['img'] ?></td>
                                                    <td><?php echo $article['legend'] ?></td>

                                                    <th><a class="delete btn btn-danger" data-toggle="modal"
                                                           data-id="<?php echo $article['id'] ?>"
                                                           data-target="#deleteModalArticle"><i class="fa fa-times-circle"></i></a>
                                                        <a href="/admin/articles/edit.php?id=<?php echo $article['id'] ?>"
                                                           class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                    </th>
                                                </tr>
                                            <?php }
                                        }
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <br>
                    <!-- CATEGORIE  -->
                    <div class="card mb-12">
                        <div class="card-header">
                            Catégories
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <form class="form-inline">
                                    <label class="sr-only" for="name">Nom : </label>
                                    <input class="form-control mb-1 mr-sm-1 mb-sm-0" id="name" type="text"
                                           placeholder="Nom">
                                    <input class="form-control mb-1 mr-sm-1 mb-sm-0" id="description" type="text"
                                           placeholder="Description">
                                    <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                                        <span class="input-group-addon" id="sizing-addon2"><a target="_blank" onclick="openKCFinder_singleFile();" ><i class="fa fa-folder-open-o"></i></a> </span>
                                        <input type="text" class="form-control" id="path" placeholder="Chemin" aria-describedby="sizing-addon2">
                                    </div>
                                    <input class="form-control mb-1 mr-sm-1 mb-sm-0" id="legend" type="text"
                                           placeholder="Légende">

                                    <div class="form-group">
                                        <select class="custom-select form-control mb-1 mr-sm-1 mb-sm-0" id="subject">
                                            <option value="elec">Electronique</option>
                                            <option value="info">Informatique</option>
                                            <option value="voyage">Voyage</option>
                                        </select>
                                    </div>
                                    <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                                </form>
                                <br>
                            </div>

                            <div class="table-responsive" id="divActCat">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Légende</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                                    $bdd = connexionDB();
                                    if (isset($bdd)) {
                                        $categories = getAllCategoriesArticle($bdd);
                                        if (!empty($categories)) {
                                            foreach ($categories as $categorie) { ?>

                                                <tr>
                                                    <td><?php echo $categorie['id'] ?></td>
                                                    <td><?php echo $categorie['name'] ?></td>
                                                    <td><?php echo $categorie['description'] ?></td>
                                                    <td><?php echo $categorie['img'] ?></td>
                                                    <td><?php echo $categorie['legend'] ?></td>
                                                    <th><a class="delete btn btn-danger" data-toggle="modal"
                                                           data-id="<?php echo $categorie['id'] ?>"
                                                           data-target="#deleteModalCategorie"><i
                                                                    class="fa fa-times-circle"></i></a>
                                                        <a href="/admin/bd_articles/edit.php?id=<?php echo $categorie['id'] ?>"
                                                           class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                    </th>
                                                </tr>
                                            <?php }
                                        }
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>






                </div>
            </div>


        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="deleteModalCategorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                La suppression est définitive.

                <div id="lien"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <input class="btn btn-danger" type="button" name="lien" data-dismiss="modal" onclick="deleteCat();"
                       value="Supprimer"/>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModalArticle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                La suppression est définitive.

                <div id="lien"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <input class="btn btn-danger" type="button" name="lien" data-dismiss="modal" onclick="deleteArticle();"
                       value="Supprimer"/>
            </div>
        </div>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/footer.php"); ?>
<script src="/admin/assets/js/notify.js" type="text/javascript"></script>
<script>
    var url;
    $(document).on("click", ".delete", function () {
        url = $(this).data('id');
    });

    function actualiseDataCat(divActCat) {
        $("#divActCat").load("index.php #divActCat");
    }

    function actualiseDataArt(divActArt) {
        $("#divActArt").load("index.php #divActArt");
    }

    bootstrap_alert = function () {
    }
    bootstrap_alert.warning = function (message) {
        $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>').show("slow").delay(3000).hide("slow");
    }


    function deleteCat() {
        var dataString = 'type=categorie&' + 'id=' + url;
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: dataString,
            cache: false,
            success: function (result) {
                $.notify({
                    // options
                    message: result
                }, {
                    // settings
                    type: 'danger',
                    offset: 70,

                });
            }
        });
        actualiseDataCat();
    }


    function deleteArticle() {
        var dataString = 'type=article&' + 'id=' + url;
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: dataString,
            cache: false,
            success: function (result) {
                $.notify({
                    // options
                    message: result
                }, {
                    // settings
                    type: 'danger',
                    offset: 70,

                });
            }
        });
        actualiseDataArt();
    }


    $(document).ready(function () {

        $("#submit").click(function () {
            var type = "categorie";
            var name = $("#name").val();
            var description = $("#description").val();
            var path = $("#path").val();
            var legend = $("#legend").val();
            var subject = $("#subject").val();
// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'type=' + type + '&name=' + name + '&description=' + description + '&path=' + path + '&legend=' + legend + '&subject=' + subject;
            if (type == '' || name == '' || description == '' || path == '' || legend == '' || subject== '') {
                $.notify({
                    // options
                    message: "Please Fill All Fields"
                }, {
                    // settings
                    type: 'warning',
                    offset: 70,

                });
            }
            else {
// AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: dataString,
                    cache: false,
                    success: function (result) {

                        $.notify({
                            // options
                            message: result
                        }, {
                            // settings
                            type: 'success',
                            offset: 70,

                        });
                    }
                });
                actualiseDataCat();
            }
            return false;
        });


    });



    function openKCFinder_singleFile() {
        window.KCFinder = {};
        window.KCFinder.callBack = function(url) {
            console.log(url);
            document.getElementById("path").value = url;
            window.KCFinder = null;
        };
        window.open('/kcfinder/browse.php', 'kcfinder_single');
    }

</script>

</body>
</html>