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
            <li class="breadcrumb-item ">Favoris</li>
        </ol>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Favoris</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="/admin/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">

                    <br>
                    <div id="mainform">

                        <div id="form">
                            <form class="form-inline">
                                <label class=" mb-1 mr-sm-1 mb-sm-0">Nom :</label>
                                <input class="form-control mb-1 mr-sm-1 mb-sm-0" id="nom" type="text">
                                <label class=" mb-1 mr-sm-1 mb-sm-0">Url :</label>
                                <input class="form-control mb-1 mr-sm-1 mb-sm-0" id="url" type="text">
                                <label class=" mb-1 mr-sm-1 mb-sm-0">Description :</label>
                                <input class="form-control mb-1 mr-sm-1 mb-sm-0" id="description" type="text">
                                <label class=" mb-1 mr-sm-1 mb-sm-0">Cat :</label>
                                <select id="id_categorie" name="id_categorie" class="custom-select mb-1 mr-sm-1 mb-sm-0">
                                    <?php $bdd = connexionDB();
                                    $categories = getAllCategorieFavoris($bdd);
                                    foreach ($categories as $categorie) { ?>

                                        <option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['name']; ?></option>
                                    <?php } ?>
                                </select>
                                    <input id="submit" type="button" value="+"  class="btn btn-primary">
                            </form>
                        </div>
                    </div>

                    <div id="mainform2">

                        <div id="form2">
                            <form class="form-inline">
                                <label for="name" class=" mb-1 mr-sm-1 mb-sm-0">Ajouter une catégorie :</label>
                                <input class="form-control mb-1 mr-sm-1 mb-sm-0" id="name" type="text">
                                <input id="submitCat" type="button" value="+"  class="btn btn-primary">
                            </form>
                        </div>
                    </div>







                    <br>


                    <div id="divAct">
                        <?php
                        try {
                            $bdd = connexionDB();
                            $categories = getAllCategorieFavoris($bdd);
                            foreach ($categories as $categorie) { ?>
                                <div class="card mb-12">
                                    <div class="card-header">
                                        <?php echo $categorie['name']; ?>  <a class="delete" data-toggle="modal" data-id="<?php echo $categorie['id'] ?>" data-target="#deleteModalCat"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php
                                            $favoris = getFavorisByCategorie($bdd, $categorie['id']);
                                            foreach ($favoris as $favori) { ?>
                                                <div class="col-md-3" style="margin-bottom: 10px;">
                                                    <a class="btn btn-info" href="<?php echo $favori['link']; ?>"
                                                       data-toggle="tooltip" data-placement="top"
                                                       title="<?php echo $favori['description']; ?>"><img width="20"
                                                       src="http://www.google.com/s2/favicons?domain=<?php echo getDomain($favori['link']); ?>"/> <?php echo $favori['name']; ?>
                                                    </a>
                                                    <sup><a class="delete" data-toggle="modal"
                                                            data-id="<?php echo $favori['id'] ?>"
                                                            data-target="#deleteModal"><i class="fa fa-times-circle"></i></a></sup>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            $bdd = null;
                        } catch (PDOException $e) {
                            print "Erreur !: " . $e->getMessage() . "<br/>";
                            die();
                        }
                        ?>
                    </div>

                </div>
            </div>


        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <input class="btn btn-danger" type="button" data-dismiss="modal" name="lien" onclick="deleteFavori();"
                       value="Supprimer"/>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModalCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                La suppression de la catégorie et de <b> son contenu</b> est définitive.

                <div id="lien"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <input class="btn btn-danger" type="button" data-dismiss="modal" name="lien" onclick="deleteCatFavori();"
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

    function actualisedata(divAct) {
        $("#divAct").load("index.php #divAct");
    }

    bootstrap_alert = function () {
    }
    bootstrap_alert.warning = function (message) {
        $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>').show("slow").delay(3000).hide("slow");
    }


    function deleteFavori() {
        var dataString = 'type=favoris' + '&id=' + url;
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
        actualisedata();

    }

    function deleteCatFavori() {
        var dataString = 'type=catFavoris' + '&id=' + url;
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
        actualisedata();

    }


    $(document).ready(function () {
        actualisedata();
        $("#submit").click(function () {
            var nom = $("#nom").val();
            var url = $("#url").val();
            var description = $("#description").val();
            var idCat = $("#id_categorie").val();
// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'nom=' + nom + '&url=' + url + '&description=' + description + '&id_categorie=' + idCat;
            if (nom == '' || url == '' || description == '' || idCat == '') {
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
                actualisedata();
            }
            return false;
        });

        $("#submitCat").click(function () {
            var name = $("#name").val();
// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'name=' + name;
            if (name == '') {
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
                actualisedata();
            }
            return false;
        });

    });

</script>

</body>
</html>