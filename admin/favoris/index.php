<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions
?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "admin/elements/head.php"); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include($_SERVER['DOCUMENT_ROOT'] . "admin/elements/nav.php"); ?>


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
                <div class="col-md-6 text-right">
                    <a href="/admin/articles/add.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter
                        un article</a>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">


                    <div id="mainform">
                        <div id="form">
                            <div>
                                <label>Nom :</label>
                                <input id="nom" type="text">
                                <label>Url :</label>
                                <input id="url" type="text">
                                <label>Description :</label>
                                <input id="description" type="text">
                                <label>Catégorie :</label>
                                <select id="id_categorie" name="id_categorie">
                                    <?php $bdd = ConnexionDB();
                                    $categories = GetAllCategorieFavoris($bdd);
                                    foreach ($categories as $categorie) {?>

                                     <option value="<?php echo $categorie['id'];  ?>"><?php echo $categorie['name'];  ?></option>
                                    <?php  } ?>
                                </select>
                                <input id="submit" type="button" value="Submit">
                            </div>
                        </div>
                    </div>

                    <div id="divAct">
                        <?php
                        try {
                            $bdd = ConnexionDB();
                            $categories = GetAllCategorieFavoris($bdd);
                            foreach ($categories as $categorie) { ?>
                                <div class="card mb-12">
                                    <div class="card-header">
                                        <?php echo $categorie['name']; ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <?php
                                            $favoris = GetFavorisByCategorie($bdd, $categorie['id']);
                                            foreach ($favoris

                                            as $favori) { ?>
                                            <div class="col-md-2">
                                                <a href="<?php echo $favori['link']; ?>"><?php echo $favori['name']; ?></a>
                                                <img width="40" src="http://www.google.com/s2/favicons?domain=<?php echo GetDomain($favori['link']); ?>"/>
                                                <a class="delete btn btn-danger" data-toggle="modal" data-id="<?php echo $favori['id']?>" data-target="#deleteModal"><i class="fa fa-times-circle"></i></a>
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
                <input class="btn btn-danger" type="button" name="lien" onclick="deleteFavori();" value="Supprimer"/>
            </div>
        </div>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "admin/elements/footer.php"); ?>

<script>
    var url;
    $(document).on("click", ".delete", function () {
        url = $(this).data('id');
    });

    function actualisedata(divAct) {
        $("#divAct").load("index.php #divAct");
    }

    function deleteFavori() {
        var dataString = 'id=' + url;
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: dataString,
            cache: false,
            success: function (result) {
                alert(result);
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
                alert("Please Fill All Fields");
            }
            else {
// AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        alert(result);
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