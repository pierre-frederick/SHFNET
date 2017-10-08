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
            <li class="breadcrumb-item">Gestion site web</li>
            <li class="breadcrumb-item active">Travels</li>
            <li class="breadcrumb-item">Voyages</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Gestion des voyages</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="/admin/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/admin/travels/add.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter
                        un voyage</a>
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

                        <div id="divActTrav" class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Lieu</th>
                                        <th>Adresse</th>
                                        <th>Ville</th>
                                        <th>Pays</th>
                                        <th>Début</th>
                                        <th>Fin</th>
                                        <th>Carte</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                                    $bdd = connexionDB();
                                    if (isset($bdd)) {
                                        $voyages = getAllVgVoyages($bdd);
                                        if (!empty($voyages)) {
                                            foreach ($voyages as $voyage) { ?>
                                                <tr>
                                                    <td><?php echo $voyage['id'] ?></td>
                                                    <td><?php echo $voyage['name'] ?></td>
                                                    <td><?php echo $voyage['place'] ?></td>
                                                    <td><?php echo $voyage['address'] ?></td>
                                                    <td><?php echo $voyage['city'] ?></td>
                                                    <td><?php echo $voyage['country'] ?></td>
                                                    <td><?php echo  date("d/m/Y", strtotime($voyage['date_debut']));  ?></td>
                                                    <td><?php echo  date("d/m/Y", strtotime($voyage['date_fin']));  ?></td>
                                                    <td><?php $carte = getVgMapById($bdd, $voyage['id_vg_map']); echo $carte['name'];  ?></td>
                                                    <th><a class="delete btn btn-danger" data-toggle="modal"
                                                           data-id="<?php echo $voyage['id'] ?>"
                                                           data-target="#deleteModalVoyage"><i class="fa fa-times-circle"></i></a>
                                                        <a href="/admin/articles/edit.php?id=<?php echo $voyage['id'] ?>"
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
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                                    $bdd = connexionDB();
                                    if (isset($bdd)) {
                                        $categories = getAllVgCategorie($bdd);
                                        if (!empty($categories)) {
                                            foreach ($categories as $categorie) { ?>
                                                <tr>
                                                    <td><?php echo $categorie['id'] ?></td>
                                                    <td><?php echo $categorie['name'] ?></td>
                                                    <td><?php echo $categorie['description'] ?></td>
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
<div class="modal fade" id="deleteModalVoyage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <input class="btn btn-danger" type="button" name="lien" data-dismiss="modal" onclick="deleteVoyage();"
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
        $("#divActCat").load("voyages.php #divActCat");
    }

    function actualiseDataTravel(divActTrav) {
        $("#divActTrav").load("voyages.php #divActTrav");
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


    function deleteVoyage() {
        var dataString = 'type=voyage&' + 'id=' + url;
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
        actualiseDataTravel();
    }


    $(document).ready(function () {

        $("#submit").click(function () {
            var type = "categorie";
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