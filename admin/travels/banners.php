<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/functions.php'; // fichier des fonctions
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
            <li class="breadcrumb-item">Banners</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Gestion des bannières</h1>
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
                    <!-- BANNER -->
                    <div class="card mb-12">
                        <div class="card-header">
                            New
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <form>
                                    <div class="form-group">
                                        <label for="titre">Titre :</label>
                                        <input class="form-control" id="titre" type="text" placeholder="Titre">
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle">Sous-titre : </label>
                                        <input class="form-control" id="subtitle" type="text" placeholder="Sous-Titre">
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Lien de la bannière :</label>
                                        <input class="form-control" id="link" type="text" placeholder="Lien">
                                    </div>
                                    <div class="input-group">
                                        <label for="path">Chemin du média : </label>
                                        <span class="input-group-addon" id="sizing-addon2"><a target="_blank" onclick="openKCFinder_singleFile();" ><i class="fa fa-folder-open-o"></i></a> </span>
                                        <input type="text" class="form-control" id="path" placeholder="Chemin" aria-describedby="sizing-addon2">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="dateBanner">Date : </label>
                                        <input class="form-control" type="date" value="2017-01-01" id="dateBanner">
                                    </div>

                                    <button type="submit" id="submit" class="btn btn-primary">Ajouter</button>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card mb-12">
                        <div class="card-header">
                            Banners
                        </div>
                        <div id="divActBann" class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titre</th>
                                        <th>Sous-titre</th>
                                        <th>Lien</th>
                                        <th>Url</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                                    $bdd = connexionDB();
                                    if(isset($bdd)) {

                                        $banners = getAllVgBanners($bdd);
                                        if(!empty($banners)) {
                                            foreach($banners as $banner) {?>

                                                <tr>
                                                    <td><?php echo $banner['id']?></td>
                                                    <td><?php echo $banner['title']?></td>
                                                    <td><?php echo $banner['subtitle']?></td>
                                                    <td><?php echo $banner['link']?></td>
                                                    <td><?php echo $banner['urlmedia']?></td>
                                                    <td><?php echo  date("d/m/Y", strtotime($banner['date_banner']));  ?></td>
                                                    <td><a class="delete btn btn-danger" data-toggle="modal" data-id="<?php echo $banner['id']?>" data-target="#deleteModal"><i class="fa fa-times-circle"></i></a>
                                                        <a href="/admin/travels/edit.php?id=<?php echo $banner['id']?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } }} else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';} ?>
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input class="btn btn-danger" type="button" data-dismiss="modal" name="lien" onclick="deleteBanner();" value="Supprimer"/>
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

    function actualiseDataBanner(divActBann) {
        $("#divActBann").load("banners.php #divActBann");
    }


    bootstrap_alert = function () {
    }
    bootstrap_alert.warning = function (message) {
        $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>').show("slow").delay(3000).hide("slow");
    }


    function deleteBanner() {
        var dataString = 'type=banner&' + 'id=' + url;
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
        actualiseDataBanner();
    }




    $(document).ready(function () {

        $("#submit").click(function () {
            var type = "banner";
            var title = $("#titre").val();
            var subtitle = $("#subtitle").val();
            var link = $("#link").val();
            var media = $("#media").val();
            var path = $("#path").val();
            var dateBanner = $("#dateBanner").val();

// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'type=' + type + '&title=' + title + '&subtitle=' + subtitle + '&link=' + link + '&urlmedia=' + path + '&dateBanner=' + dateBanner;
            if (type == '' || title == '' || subtitle == '' || link == '' || path == '' || dateBanner == '') {
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
                actualiseDataBanner();
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