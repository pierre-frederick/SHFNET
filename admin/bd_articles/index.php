<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions
?>


<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/head.php"); ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="/admin/assets/js/gijgo.js" type="text/javascript"></script>
<link href="/admin/assets/css/gijgo.css" rel="stylesheet" type="text/css"/>

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
            <li class="breadcrumb-item">BD Magazines</li>
        </ol>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Base documentaire</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="/admin/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/admin/bd_articles/article.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter
                        un article</a>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12">
                    <br>
                    <!-- MAGAZINES -->
                    <div class="card mb-12">
                        <div class="card-header">
                            Magazines
                        </div>
                        <div id="divActMag" class="card-body">
                            <div class="col-md-12">
                                <form class="form-inline">
                                    <label class=" mb-1 mr-sm-1 mb-sm-0">Ajouter un nouveau magazine : </label>
                                    <label class="sr-only" for="titre">Titre : </label>
                                    <input class="form-control mb-1 mr-sm-1 mb-sm-0" id="titre" type="text"
                                           placeholder="Titre">
                                    <label class="sr-only" for="numero">Numéro : </label>
                                    <input class="form-control mb-1 mr-sm-1 mb-sm-0" id="numero" type="text"
                                           placeholder="Numéro">
                                    <label class="sr-only" for="datepicker">Date : </label>
                                    <input id="datepicker" width="276"/>
                                    <button type="submit" id="submitMag" class="btn btn-primary">Submit</button>
                                </form>
                                <br>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titre</th>
                                        <th>Numéro</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                                    $bdd = connexionDB();
                                    if (isset($bdd)) {
                                        $articles = getAllBdMagazines($bdd);
                                        if (!empty($articles)) {
                                            foreach ($articles as $article) { ?>

                                                <tr>
                                                    <td><?php echo $article['id'] ?></td>
                                                    <td><?php echo $article['titre'] ?></td>
                                                    <td><?php echo $article['numero'] ?></td>
                                                    <td><?php echo $article['date_magazine']; ?></td>
                                                    <th><a class="delete btn btn-danger" data-toggle="modal"
                                                           data-id="<?php echo $article['id'] ?>"
                                                           data-target="#deleteMagazineModal"><i
                                                                    class="fa fa-times-circle"></i></a>
                                                        <a href="/admin/bd_articles/edit.php?id=<?php echo $article['id'] ?>"
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
                    <!-- TAGS -->
                    <div class="card mb-12">
                        <div class="card-header">
                            Tags
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <form class="form-inline">
                                    <label class=" mb-2 mr-sm-2 mb-sm-0">Ajouter un nouveau tag : </label>
                                    <label class="sr-only" for="name">Nom : </label>
                                    <input class="form-control mb-2 mr-sm-2 mb-sm-0" id="name" type="text"
                                           placeholder="Nom">
                                    <label class="sr-only" for="description">Description
                                        : </label>
                                    <input class="form-control mb-2 mr-sm-2 mb-sm-0" id="description" type="text"
                                           placeholder="Description">
                                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <br>
                            </div>
                            <div class="table-responsive" id="divActTag">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                                    $bdd = connexionDB();
                                    if (isset($bdd)) {
                                        $tags = getAllBdTag($bdd);
                                        if (!empty($tags)) {
                                            foreach ($tags as $tag) { ?>

                                                <tr>
                                                    <td><?php echo $tag['id'] ?></td>
                                                    <td><?php echo $tag['name'] ?></td>
                                                    <td><?php echo $tag['description'] ?></td>
                                                    <th><a class="delete btn btn-danger" data-toggle="modal"
                                                           data-id="/admin/bd_articles/delete.php?id=<?php echo $tag['id'] ?>"
                                                           data-target="#deleteTagModal"><i
                                                                    class="fa fa-times-circle"></i></a>
                                                        <a href="/admin/bd_articles/edit.php?id=<?php echo $tag['id'] ?>"
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

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteMagazineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    La suppression du magazine est définitive.

                    <div id="lien"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <input class="btn btn-danger" type="button" data-dismiss="modal" name="lien"
                           onclick="deleteMagazine();"
                           value="Supprimer"/>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteTagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    La suppression du tag est définitive.

                    <div id="lien"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <input class="btn btn-danger" type="button" data-dismiss="modal" name="lien"
                           onclick="deleteTag();"
                           value="Supprimer"/>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format: 'yyyy-mm-dd'
        });
    </script>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/footer.php"); ?>
    <script src="/admin/assets/js/notify.js" type="text/javascript"></script>
    <script>

        var url;
        $(document).on("click", ".delete", function () {
            url = $(this).data('id');
        });

        function actualiseDataTag(divActTag) {
            $("#divActTag").load("index.php #divActTag");
        }

        function actualiseDataMagazines(divActMag) {
            $("#divActMag").load("index.php #divActMag");
        }


        bootstrap_alert = function () {
        }
        bootstrap_alert.warning = function (message) {
            $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>').show("slow").delay(3000).hide("slow");
        }


        function deleteMagazine() {
            var dataString = 'id=' + url;
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
            actualiseDataMagazines();
        }

        function deleteTag() {
            var dataString = 'id=' + url;
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
            actualiseDataTag();
        }


        $(document).ready(function () {
            actualiseDataTag();
            $("#submit").click(function () {
                var type = "tag";
                var name = $("#name").val();
                var description = $("#description").val();
// Returns successful data submission message when the entered information is stored in database.
                var dataString = 'type=' + type + '&name=' + name + '&description=' + description;
                if (type == '' || name == '' || description == '') {
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
                    actualiseDataTag();
                }
                return false;
            });

            $("#submitMag").click(function () {
                var type = "magazine";
                var titre = $("#titre").val();
                var numero = $("#numero").val();
                var date_magazine = $("#datepicker").val();
// Returns successful data submission message when the entered information is stored in database.
                var dataString = 'type=' + type + '&titre=' + titre + '&numero=' + numero + '&date_magazine=' + date_magazine;
                if (type == '' || titre == '' || numero == '' || date_magazine == '') {
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
                    actualiseDataMagazines();
                }
                return false;
            });

        });

    </script>

</body>
</html>