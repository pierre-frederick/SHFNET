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
            <li class="breadcrumb-item active">Gestion site web</li>
            <li class="breadcrumb-item active">Articles</li>
            <li class="breadcrumb-item">Add</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Ajouter un article</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="/admin/articles/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i>
                        Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <form>

                            <div class="form-group row">
                                <label for="title" class="col-2 col-form-label">Titre :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="title" id="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subtitle" class="col-2 col-form-label">Sous-titre :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="subtitle" id="subtitle">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categorie" class="col-2 col-form-label">Catégorie :</label>
                                <div class="col-10">
                                    <?php $bdd = connexionDB();
                                    $tags = getAllCategoriesArticle($bdd);
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
                                <label for="date" class="col-2 col-form-label">Date :</label>
                                <div class="col-10">
                                    <input class="form-control" type="date" name="date_article" value="2017-01-01" id="date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="auteur" class="col-2 col-form-label">Auteur :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="author" id="auteur">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="auteur" class="col-2 col-form-label">Image principale :</label>
                                    <div class="input-group col-10">
                                        <span class="input-group-addon" id="sizing-addon2"><a target="_blank" onclick="openKCFinder_singleFile();" ><i class="fa fa-folder-open-o"></i></a> </span>
                                        <input type="text" class="form-control" id="path" placeholder="Chemin" aria-describedby="sizing-addon2" name="path">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="legend" class="col-2 col-form-label">Légende :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="legend" id="legend">
                                </div>
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

            var type = "article";
            var title = $("#title").val();
            var subtitle = $("#subtitle").val();
            var editor = CKEDITOR.instances['editor1'].getData();
            var editor1 = JSON.stringify(editor);
            var date = $("#date").val();
            var auteur = $("#auteur").val();
            var path = $("#path").val();
            var legend = $("#legend").val();

// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'type=' + type + '&title=' + title + '&subtitle=' + subtitle + '&contenu=' + editor + '&date_article=' + date + '&author=' + auteur + '&path=' + path + '&legend=' + legend + '&tags=' + arrayTagSerialized;
            if (type == '' || title == '' || subtitle == '' || editor1 == '' || date == '' || auteur == '' || path == '' || legend == '' || arrayTagSerialized == '') {
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

