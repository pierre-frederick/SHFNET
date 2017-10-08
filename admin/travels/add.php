<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/head.php"); ?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

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
            <li class="breadcrumb-item">Add</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Ajouter un voyage</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="/admin/travels/voyages.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i>
                        Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <form>

                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">nom :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="name" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="place" class="col-2 col-form-label">Lieu :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="place" id="place">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categorie" class="col-2 col-form-label">Catégorie :</label>
                                <div class="col-10">
                                    <?php $bdd = connexionDB();
                                    $tags = getAllVgCategorie($bdd);
                                    $i = 0;
                                    foreach ($tags as $tag) { ?>
                                        <div class="form-check form-check-inline">
                                            <div class="checkboxTag">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           id="inlineCheckbox<?php echo $i; ?>"
                                                           value="<?php echo $tag['id']; ?>"> <?php echo $tag['name']; ?>
                                                </label>
                                            </div>
                                        </div>
                                        <?php $i = $i + 1;
                                    } ?>
                                </div>
                            </div>

                            <label for="editor1">Contenu :</label>
                            <textarea id="editor1" name="editor1">
	                             </textarea><br/>

                            <div class="form-group row">
                                <label for="date_debut" class="col-2 col-form-label">Date de début :</label>
                                <div class="col-10">
                                    <input class="form-control" type="date" name="date_debut" value="2017-01-01" id="date_debut">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_fin" class="col-2 col-form-label">Date de fin :</label>
                                <div class="col-10">
                                    <input class="form-control" type="date" name="date_fin" value="2017-01-01" id="date_fin">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-2 col-form-label">Adresse :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="address" id="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-2 col-form-label">Ville :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="city" id="city">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-2 col-form-label">Pays :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="country" id="country">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_vg_map" class="col-2 col-form-label">Carte :</label>
                                <div class="col-10">
                                    <select id="id_vg_map" name="id_vg_map" class="custom-select mb-1 mr-sm-1 mb-sm-0">
                                        <?php $bdd = connexionDB();
                                        $maps = getAllVgMaps($bdd);
                                        foreach ($maps as $map) { ?>
                                            <option value="<?php echo $map['id']; ?>"><?php echo $map['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture_on_top" class="col-2 col-form-label">Photo de couverture :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="picture_on_top" id="picture_on_top">
                                </div>
                            </div>

                            <div class="jumbotron" style="height: 300px; overflow-x: scroll;">

                                    <?php $bdd = connexionDB();
                                    $pictures = getAllVgPhoto($bdd);
                                    $i = 0;
                                    foreach ($pictures as $picture) { ?>
                                        <div class="form-check form-check-inline">
                                            <div class="checkboxPicture">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           id="inlineCheckboxP<?php echo $i; ?>"
                                                           value="<?php echo $picture['id']; ?>">
                                                </label>
                                                <img src="<?php echo $picture['link']; ?>" href="<?php echo $picture['link']; ?>" height="75">
                                            </div>
                                        </div>
                                        <?php $i = $i + 1;
                                    } ?>
                            </div>

                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div><!-- /.container-fluid -->

</div><!-- /.content-wrapper -->

<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/ckeditor.php"); ?>

<script src="/admin/assets/js/notify.js" type="text/javascript"></script>
<script>

    bootstrap_alert = function () {
    }
    bootstrap_alert.warning = function (message) {
        $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>').show("slow").delay(3000).hide("slow");
    }

    function openKCFinder_singleFile() {
        window.KCFinder = {};
        window.KCFinder.callBack = function(url) {
            console.log(url);
            document.getElementById("path").value = url;
            window.KCFinder = null;
        };
        window.open('/kcfinder/browse.php', 'kcfinder_single');
    }


    $(document).ready(function () {

        $("#submit").click(function () {
            var arrayTag = [];
            var n = $('div[class="checkboxTag"]').length;
            for (i = 0, n; i < n; i++) {
                if ($('#inlineCheckbox' + i).prop('checked')) {
                    console.log("checkbox" + i + "checked");
                    var value = $('#inlineCheckbox' + i).val();
                    arrayTag.push(value);
                }
            }
            var arrayTagSerialized = JSON.stringify(arrayTag);

            var arrayPicture = [];

            var n = $('div[class="checkboxPicture"]').length;
            for (i = 0, n; i < n; i++) {
                if ($('#inlineCheckboxP' + i).prop('checked')) {
                    console.log("checkbox" + i + "checked");
                    var value = $('#inlineCheckboxP' + i).val();
                    arrayPicture.push(value);
                }
            }
            var arrayPictureSerialized = JSON.stringify(arrayPicture);
            console.log(arrayPictureSerialized);
            var type = "voyage";
            var name = $("#name").val();
            var place = $("#place").val();
            var editor = CKEDITOR.instances['editor1'].getData();
            var editor1 = JSON.stringify(editor);
            var address = $("#address").val();
            var city = $("#city").val();
            var country = $("#country").val();
            var date_debut = $("#date_debut").val();
            var date_fin = $("#date_fin").val();
            var id_vg_map = $("#id_vg_map").val();
            var picture_on_top = $("#picture_on_top").val();

// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'type=' + type + '&name=' + name + '&place=' + place + '&contenu=' + editor + '&address=' + address + '&city=' + city + '&country=' + country + '&date_debut=' + date_debut + '&date_fin=' + date_fin + '&tags=' + arrayTagSerialized + '&pictures=' + arrayPictureSerialized + '&id_vg_map=' + id_vg_map + '&picture_on_top=' + picture_on_top;
            if (type == '' || name == '' || place == '' || editor == '' || address == '' || city == '' || country == '' || date_debut == '' || date_fin == '' || arrayTagSerialized == '' || arrayPictureSerialized =='' || id_vg_map =='' || picture_on_top =='') {
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
            }
            return false;
        });


    });


</script>

</body>
</html>

