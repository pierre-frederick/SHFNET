<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions ?>

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
            <li class="breadcrumb-item">Administration</li>
        </ol>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Administration</h1>
                    <br>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-8">
                        <div class="card-header">
                            <i class="fa fa-external-link"></i> Administration
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <a href="http://ns.shfnet.loc/ossec/" class="btn btn-info" target="_blank"><i class="fa fa-lock"></i>
                                    Ossec Master</a>
                            </div>
                            <hr>

                            <div class="row">
                                <p><a href="https://mail.shfnet.loc:10000/"
                                   class="btn btn-info" target="_blank"><i class="fa fa-server"></i> Webmin Mail </a>

                                <a href="https://ns.shfnet.loc:10000/"
                                   class="btn btn-info" target="_blank"><i class="fa fa-server"></i> Webmin NS  </a>

                                <a href="https://vpn.shfnet.loc:10000/"
                                   class="btn btn-info" target="_blank"><i class="fa fa-server"></i> Webmin VPN  </a>
                                </p>
                            </div>
                            <hr>
                            <div class="row">
                                <p><a href="http://ns.shfnet.loc/munin/shfnet.loc/mail.shfnet.loc/index.html"
                                      class="btn btn-info" target="_blank"><i class="fa fa-area-chart"></i> Munin Mail </a>

                                    <a href="http://ns.shfnet.loc/munin/shfnet.loc/monitoring.shfnet.loc/index.html"
                                       class="btn btn-info" target="_blank"><i class="fa fa-area-chart"></i> Munin NS  </a>

                                    <a href="http://ns.shfnet.loc/munin/shfnet.loc/vpn.shfnet.loc/index.html"
                                       class="btn btn-info" target="_blank"><i class="fa fa-area-chart"></i> Munin VPN  </a>
                                </p>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa fa-external-link"></i> Services
                        </div>
                        <div class="card-body">
                            <a href="https://mail.shfnet.fr/" class="btn btn-info" target="_blank"><i class="fa fa-envelope-o"></i> Mail</a>
                            <a href="https://git.shfnet.fr/" class="btn btn-info" target="_blank"><i class="fa fa-gitlab"></i> Git</a>
                            <a href="http://nas.shfnet.loc/photo/" class="btn btn-info" target="_blank"><i class="fa fa-picture-o"></i> Photos</a>

                        </div>
                    </div>
                </div>
            </div>
<br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-8">
                        <div class="card-header">
                            <i class="fa fa-external-link"></i> Réseau
                        </div>
                        <div class="card-body">
                            <a href="http://router.shfnet.loc/" class="btn btn-info" target="_blank"><i class="fa fa-random"></i>
                                Routeur</a>
                            <a href="http://switch1.shfnet.loc/" class="btn btn-info" target="_blank"><i class="fa fa-compress"></i>
                                Switch1</a>
                            <a href="http://wlan.shfnet.loc/" class="btn btn-info" target="_blank"><i class="fa fa-wifi"></i> Borne Wifi</a>
                            <a href="http://ups.shfnet.loc/" class="btn btn-info" target="_blank"><i class="fa fa-battery-half"></i> UPS</a>
                            <a href="http://nas.shfnet.loc:5000/" class="btn btn-info" target="_blank"><i class="fa fa-database"></i> NAS</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa fa-home"></i> Home
                        </div>
                        <div class="card-body">
                            <a href="https://domotic.shfnet.loc" class="btn btn-info"><i class="fa fa-home"></i>
                                Domoticz</a>
                            <a href="http://printer.shfnet.loc" class="btn btn-info"><i class="fa fa-print"></i>
                                Imprimante</a>
                            <hr>
                            <a href="http://3Dprinter.shfnet.loc" class="btn btn-info"><i class="fa fa-cubes"></i>
                                3D Printer</a>
                        </div>
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
    <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <input class="btn btn-danger" type="button" name="lien" onclick="window.location.href = url;"
                       value="Supprimer"/>
            </div>
        </div>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/footer.php"); ?>

<script>
    var url;
    $(document).on("click", ".delete", function () {
        url = $(this).data('id');
    });
</script>

</body>
</html>