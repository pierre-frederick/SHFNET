<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/functions.php'; // fichier des fonctions
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
            <li class="breadcrumb-item">Administration</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Administration</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-12">
                        <div class="card-header">
                            Quick access
                        </div>
                        <div class="card-body">


                        </div>
                    </div>
                </div>


               <!-- <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-area-chart"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="30"></canvas>
                    </div>
                    <div class="card-footer small text-muted">
                        Updated yesterday at 11:59 PM
                    </div>
                </div> -->

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
                <input class="btn btn-danger" type="button" name="lien" onclick="window.location.href = url;" value="Supprimer"/>
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
</script>

</body>
</html>