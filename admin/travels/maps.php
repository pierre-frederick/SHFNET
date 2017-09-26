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
            <li class="breadcrumb-item">Gestion site web</li>
            <li class="breadcrumb-item active">Travels</li>
            <li class="breadcrumb-item">Cartes</li>
        </ol>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Cartes</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="/admin/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/admin/bd_articles/article.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i>
                        Ajouter
                        un article</a>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12">


                    <div class="card mb-12">
                        <div class="card-header">
                            Cartes
                        </div>
                        <div class="card-body">
                            <h2>Ajouter une nouvelle carte : </h2>
                            <form>
                                <div class="form-group">
                                    <label for="name">Nom de la carte :</label>
                                    <input type="text" class="form-control" id="name">
                                    <div class="form-inline">
                                        <div class="mb-3 mr-sm-3 mb-sm-0">
                                            <label for="name">Latitude :</label>
                                            <input type="text" class="form-control" id="name" placeholder="Ex : 33.863276" >
                                        </div>
                                        <div class="mb-3 mr-sm-3 mb-sm-0">
                                            <label for="name">Longitude :</label>
                                            <input type="text" class="form-control" id="name" placeholder="Ex : 151.207977">
                                        </div>
                                        <div class="mb-3 mr-sm-3 mb-sm-0">
                                            <label for="name">zoom :</label>
                                            <input type="text" class="form-control" id="name" placeholder="Ex : 3">
                                        </div>
                                    </div>


                                </div>
                                    <div class="form-group row" id="cadre">
                                        <!-- Formulaire d'ajout de point -->
                                    </div>
                                <input type="button" class="btn btn-primary" value="Ajouter un point" onclick="plus()"/>
                                <input type="button" class="btn btn-danger" style="display:none" id="sup"
                                       value="supprimer un champ" onclick="moins()"/>
                                <div class="form-group">
                                    <br>
                                    <input type="submit" class="btn btn-success" id="submitMap" value="Ajouter">
                                </div>

                            </form>


                            <div class="table-responsive" id="divActMap">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Centre (Lat, Long, Zoom)</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    setlocale(LC_ALL, 'fr_FR.UTF-8');
                                    $bdd = connexionDB();
                                    if (isset($bdd)) {
                                        $maps = getAllVgMaps($bdd);
                                        if (!empty($maps)) {
                                            foreach ($maps as $map) { ?>

                                                <tr>
                                                    <td><?php echo $map['id'] ?></td>
                                                    <td><?php echo $map['name'] ?></td>
                                                    <td><?php echo $map['center_lat'] . ", " . $map['center_long'] . ", " . $map['zoom']?></td>
                                                    <th><a class="delete btn btn-danger" data-toggle="modal"
                                                           data-id="/admin/bd_articles/delete.php?id=<?php echo $map['id'] ?>"
                                                           data-target="#deleteTagModal"><i
                                                                    class="fa fa-times-circle"></i></a>
                                                        <!-- <a href="/admin/bd_articles/edit.php?id=<?php echo $map['id'] ?>"
                                                           class="btn btn-success"><i class="fa fa-pencil"></i></a> -->
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
                       onclick="deleteMap();"
                       value="Supprimer"/>
            </div>
        </div>
    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/footer.php"); ?>
<script src="/admin/assets/js/notify.js" type="text/javascript"></script>
<script>

    var row, counterField, labelName, fieldName, labelLink, fieldLink, labelAddress, fieldAddress, labelType, fieldType, maDiv;

    // ajouter un champ avec son "name" propre;
    function plus() {
        row = document.getElementById('cadre');
        maDiv = document.createElement("div");
        counterField = row.getElementsByTagName('input');
        labelName = document.createElement('label');
        labelLink = document.createElement('label');
        labelAddress = document.createElement('label');
        labelType = document.createElement('label');
        fieldName = document.createElement('input');
        fieldLink = document.createElement('input');
        fieldAddress = document.createElement('input');
        fieldType = document.createElement('input');

        maDiv.setAttribute('class', "col-md-3 alert alert-info");

        labelName.setAttribute('for', "name" + counterField.length);
        labelName.setAttribute('id', "name" + counterField.length);
        fieldName.setAttribute('type', 'text');
        fieldName.setAttribute('name', "name" + counterField.length);
        fieldName.setAttribute('class', "form-control");


        labelLink.setAttribute('for', "link" + counterField.length);
        labelLink.setAttribute('id', "link" + counterField.length);
        fieldLink.setAttribute('type', 'text');
        fieldLink.setAttribute('name', "link" + counterField.length);
        fieldLink.setAttribute('class', "form-control");

        labelAddress.setAttribute('for', "address" + counterField.length);
        labelAddress.setAttribute('id', "address" + counterField.length);
        fieldAddress.setAttribute('type', 'text');
        fieldAddress.setAttribute('name', "address" + counterField.length);
        fieldAddress.setAttribute('id', "addressMap" + counterField.length);
        fieldAddress.setAttribute('class', "form-control");

        labelType.setAttribute('for', "type" + counterField.length);
        labelType.setAttribute('id', "type" + counterField.length);
        fieldType.setAttribute('type', 'text');
        fieldType.setAttribute('name', "type" + counterField.length);
        fieldType.setAttribute('class', "form-control");

        row.appendChild(maDiv);

        maDiv.appendChild(labelName);
        maDiv.appendChild(fieldName);

        maDiv.appendChild(labelLink);
        maDiv.appendChild(fieldLink);

        maDiv.appendChild(labelAddress);
        maDiv.appendChild(fieldAddress);

        maDiv.appendChild(labelType);
        maDiv.appendChild(fieldType);
        /*document.getElementById('sup').style.display='inline';*/
        document.getElementById("name" + (counterField.length - 4)).innerHTML = "Nom du lieu :";
        document.getElementById("link" + (counterField.length - 4)).innerHTML = "Lien :";
        document.getElementById("address" + (counterField.length - 4)).innerHTML = "Adresse du lieu :";
        document.getElementById("type" + (counterField.length - 4)).innerHTML = "Type de Lieu :";
    }

    // supprimer le dernier champ;
    /* function moins(){
         if(counterField.length>0){
             row.removeChild(counterField[counterField.length-1]);
             row.removeChild(counterField[counterField.length-1]);
             row.removeChild(counterField[counterField.length-1]);
             row.removeChild(counterField[counterField.length-1]);
         }
         if(counterField.length==0){document.getElementById('sup').style.display='none'};
     } */


    var url;
    $(document).on("click", ".delete", function () {
        url = $(this).data('id');
    });

    function actualiseDataMap(divActMap) {
        $("#divActMap").load("index.php #divActMap");
    }


    bootstrap_alert = function () {
    }
    bootstrap_alert.warning = function (message) {
        $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>').show("slow").delay(3000).hide("slow");
    }


    function deleteMap() {
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
        actualiseDataMap();
    }


    $(document).ready(function () {
        actualiseDataTag();
        $("#submit2").click(function () {
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
                            offset: 70

                        });
                    }
                });
                actualiseDataTag();
            }
            return false;
        });

    });

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDca_YEHG52wujyMx3C_sAalf_5SOXqfY4&callback=initMap">
</script>

</body>
</html>