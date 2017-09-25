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
            <li class="breadcrumb-item">Travels</li>
        </ol>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Travels</h1>
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
                    <!-- FORM -->
                        <div id="cadre" style="margin-left:100px;width:200px">
                        </div>

                        <p>
                            <input type="button" class="btn btn-primary" value="ajouter un champ" onclick="plus()"/>

                            <input type="button" class="btn btn-danger" style="display:none" id="sup"
                                   value="supprimer un champ" onclick="moins()"/>
                            <input type="submit" class="btn btn-success" value="Submit2">
                        </p>


                    <input id="addressMap0" type="textbox" value="Sydney, NSW">
                    <input class="btn btn-success" id="submitMap" value="Geocode" type="button">

                    <div id="map" style="height: 200px; width: 200px;"></div>


                </div>


                <div class="col-md-12">
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


<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/footer.php"); ?>
<script src="/admin/assets/js/notify.js" type="text/javascript"></script>
<script>

    var row, counterField, labelName, fieldName, labelLink, fieldLink, labelAddress, fieldAddress, labelType, fieldType,
        buttonGeo;

    // ajouter un champ avec son "name" propre;
    function plus() {
        row = document.getElementById('cadre');
        counterField = row.getElementsByTagName('input');
        labelName = document.createElement('label');
        labelLink = document.createElement('label');
        labelAddress = document.createElement('label');
        labelType = document.createElement('label');
        fieldName = document.createElement('input');
        fieldLink = document.createElement('input');
        fieldAddress = document.createElement('input');
        fieldType = document.createElement('input');
        buttonGeo = document.createElement('input');
        labelName.setAttribute('for', "name" + counterField.length);
        labelName.setAttribute('id', "name" + counterField.length);
        fieldName.setAttribute('type', 'text');
        fieldName.setAttribute('name', "name" + counterField.length);

        labelLink.setAttribute('for', "link" + counterField.length);
        labelLink.setAttribute('id', "link" + counterField.length);
        fieldLink.setAttribute('type', 'text');
        fieldLink.setAttribute('name', "link" + counterField.length);

        labelAddress.setAttribute('for', "address" + counterField.length);
        labelAddress.setAttribute('id', "address" + counterField.length);
        fieldAddress.setAttribute('type', 'text');
        fieldAddress.setAttribute('name', "address" + counterField.length);
        fieldAddress.setAttribute('id', "addressMap" + counterField.length);

        labelType.setAttribute('for', "type" + counterField.length);
        labelType.setAttribute('id', "type" + counterField.length);
        fieldType.setAttribute('type', 'text');
        fieldType.setAttribute('name', "type" + counterField.length);

        buttonGeo.setAttribute('class', "btn btn-success");
        buttonGeo.setAttribute('id', "submitMap");
        buttonGeo.setAttribute('type', "button");
        buttonGeo.setAttribute('value', "Geocoder");

        row.appendChild(labelName);
        row.appendChild(fieldName);

        row.appendChild(labelLink);
        row.appendChild(fieldLink);

        row.appendChild(labelAddress);
        row.appendChild(fieldAddress);

        row.appendChild(labelType);
        row.appendChild(fieldType);

        row.appendChild(buttonGeo);
        /*document.getElementById('sup').style.display='inline';*/
        document.getElementById("name" + (counterField.length - 5)).innerHTML = "Name :";
        document.getElementById("link" + (counterField.length - 5)).innerHTML = "Link :";
        document.getElementById("address" + (counterField.length - 5)).innerHTML = "Address :";
        document.getElementById("type" + (counterField.length - 5)).innerHTML = "Type :";
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

    function actualiseDataTag(divActTag) {
        $("#divActTag").load("index.php #divActTag");
    }


    bootstrap_alert = function () {
    }
    bootstrap_alert.warning = function (message) {
        $('#alert_placeholder').html('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>').show("slow").delay(3000).hide("slow");
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


    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submitMap').addEventListener('click', function () {
            geocodeAddress(geocoder, map);
        });
    }

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('addressMap0').value;
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });

                console.log(results[0].geometry.location);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }




</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDca_YEHG52wujyMx3C_sAalf_5SOXqfY4&callback=initMap">
</script>

</body>
</html>