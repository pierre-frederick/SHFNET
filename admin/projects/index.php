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
            <li class="breadcrumb-item">Projets</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Gestion des projets</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="/admin/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/admin/projects/add.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter
                        un projet</a>
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
                        <?php if (isset($_GET['alert'])) { ?>

                            <?php echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> <strong>Succès !  </strong>" . $_GET['alert'] . "</div>";
                        } ?>

                        <div id="divActSub" class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Type</th>
                                        <th>Catégorie</th>
                                        <th>Date</th>
                                        <th>Titre</th>
                                        <th>Sous-titre</th>
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
                                        $projects = getAllProject($bdd);
                                        if (!empty($projects)) {
                                            foreach ($projects as $project) {
                                                $categories = getCategorieProject($bdd, $project['id']);
                                                ?>
                                                <tr>
                                                    <td><?php echo $project['id'] ?></td>
                                                    <td><?php foreach ($categories as $category) {
                                                            $name = getCategoriesArticleById($bdd, $category['id_categorie_article']);
                                                            echo $name['subject'] . ", ";
                                                        } ?></td>
                                                    <td><?php foreach ($categories as $category) {
                                                            $name = getCategoriesArticleById($bdd, $category['id_categorie_article']);
                                                            echo $name['name'] . ", ";
                                                        } ?></td>
                                                    <td><?php $date = strtotime($project['date_project']);
                                                        echo "Le " . date("d-m-Y", $date) . " à " . date("H:i", $date); ?></td>
                                                    <td><?php echo $project['title'] ?></td>
                                                    <td><?php echo $project['subtitle'] ?></td>
                                                    <td><?php echo $project['img'] ?></td>
                                                    <td><?php echo $project['legend'] ?></td>
                                                    <th><a class="delete btn btn-danger" data-toggle="modal"
                                                           data-id="<?php echo $project['id'] ?>"
                                                           data-target="#deleteModalProject"><i
                                                                    class="fa fa-times-circle"></i></a>
                                                        <a href="/admin/bd_articles/edit.php?id=<?php echo $project['id'] ?>"
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
<div class="modal fade" id="deleteModalProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <input class="btn btn-danger" type="button" name="lien" data-dismiss="modal" onclick="deleteSub();"
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

    function actualiseDataSub(divActSub) {
        $("#divActSub").load("index.php #divActSub");
    }


    bootstrap_alert = function () {
    }
    bootstrap_alert.warning = function (message) {
        $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>').show("slow").delay(3000).hide("slow");
    }


    function deleteSub() {
        var dataString = 'type=project&' + 'id=' + url;
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
        actualiseDataSub();
    }


</script>

</body>
</html>