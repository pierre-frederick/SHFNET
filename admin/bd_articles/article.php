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
            </div>


            <div class="row">
                <div class="col-md-12">
                    <br>
                    <!-- ARTICLES -->
                    <div class="card mb-12">
                        <div class="card-header">
                            Articles
                        </div>
                        <div id="divActArt" class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titre</th>
                                        <th>contenu</th>
                                        <th>Auteur</th>
                                        <th>Magazine</th>
                                        <th>Tag</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                                    $bdd = connexionDB();
                                    if (isset($bdd)) {
                                        $articles = getAllBdArticle($bdd);
                                        if (!empty($articles)) {
                                            foreach ($articles as $article) { ?>

                                                <tr>
                                                    <td><?php echo $article['id'] ?></td>
                                                    <td><?php echo $article['name'] ?></td>
                                                    <td><?php echo $article['contenu'] ?></td>
                                                    <td><?php echo $article['author']; ?></td>
                                                    <td><?php $magazine = getBdMagazineById($bdd, $article['id_bd_magazines']);
                                                        echo $magazine['titre'] . " - " . $magazine['numero']; ?></td>
                                                    <td><?php $tags = getBdArticleTagById($bdd, $article['id']);
                                                        foreach ($tags as $tag) {
                                                            $name = getBdTagById($bdd, $tag['id_bd_tag']);
                                                            echo $name['name'] . "; ";
                                                        }
                                                        ?></td>
                                                    <td><a class="delete btn btn-danger" data-toggle="modal"
                                                           data-target="#deleteMagazineModal"
                                                           data-id="<?php echo $article['id'] ?>"
                                                        ><i class="fa fa-times-circle"></i></a>
                                                        <a class="modalLink btn btn-success" href="#myModal"
                                                           data-toggle="modal" data-target="#myModal"
                                                           data-id="<?php echo $article['id']; ?>"
                                                           data-name="<?php echo $article['name']; ?>"
                                                           data-contenu="<?php echo $article['contenu']; ?>"
                                                           data-author="<?php echo $article['author']; ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>

                                                    </td>
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

                    <div class="card mb-12">
                        <div class="card-header">
                            Ajouter un nouvel article
                        </div>
                        <div id="divActMag" class="card-body">
                            <div class="col-md-12">
                                <form>
                                    <div class="form-group">
                                        <label for="name">Titre :</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="contenu">Contenu :</label>
                                        <textarea class="form-control" id="contenu" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Auteur :</label>
                                        <input type="text" class="form-control" id="author">
                                    </div>
                                    <div class="form-group">
                                        <label for="magazine">Magazine :</label>
                                        <select id="magazine" name="magazine" class="form-control">
                                            <?php $bdd = connexionDB();
                                            $magazines = getAllBdMagazines($bdd);
                                            foreach ($magazines as $magazine) { ?>

                                                <option value="<?php echo $magazine['id']; ?>"><?php echo $magazine['titre'] . " - " . $magazine['numero']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <?php $bdd = connexionDB();
                                    $tags = getAllBdTag($bdd);
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
                                    <br>
                                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <br>
                            </div>

                        </div>
                    </div>
                    <br>


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
                           onclick="deleteArticle();"
                           value="Supprimer"/>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


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

        function actualiseDataArticle(divActArt) {
            $("#divActArt").load("article.php #divActArt");
        }


        bootstrap_alert = function () {
        }
        bootstrap_alert.warning = function (message) {
            $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>').show("slow").delay(3000).hide("slow");
        }


        function deleteArticle() {
            var dataString = 'type=article&id=' + url;
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
            actualiseDataArticle();
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
                var name = $("#name").val();
                var contenu = $("#contenu").val();
                var author = $("#author").val();
                var magazine = $("#magazine").val();


// Returns successful data submission message when the entered information is stored in database.
                var dataString = 'type=' + type + '&name=' + name + '&contenu=' + contenu + '&author=' + author + '&id_bd_magazines=' + magazine + '&tags=' + arrayTagSerialized;
                if (type == '' || name == '' || contenu == '' || author == '' || magazine == '' || arrayTagSerialized == '') {
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
                    actualiseDataArticle();
                }
                return false;
            });


        });


        $('.modalLink').click(function () {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var contenu = $(this).attr('data-contenu');
            var author = $(this).attr('data-author');

            $.ajax({
                url: "edit.php?id=" + id + "&name=" + name + "&contenu=" + contenu + "&author=" + author,
                cache: false,
                success: function (result) {
                    $(".modal-content").html(result);
                }
            });
        });

        function updateArticle() {
            var type2 = "article";
            var name2 = $("#name1").val();
            var contenu2 = $("#contenu1").val();
            var author2 = $("#author1").val();
            var dataString2 = 'type=' + type2 + '&name=' + name2 + '&contenu=' + contenu2 + '&author=' + author2;
            if (type2 == '' || name2 == '' || contenu2 == '' || author2 == '') {
                $.notify({
                    // options
                    message: "Please Fill All Fields"
                }, {
                    // settings
                    type: 'warning',
                    offset: 70,

                });
            }
            $.ajax({
                type: "POST",
                url: "edit_bdd.php",
                data: dataString2,
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
            actualiseDataArticle();
        }


    </script>

</body>
</html>
