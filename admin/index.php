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
            <li class="breadcrumb-item active">SHFNET Dashboard</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Panneau d'administration</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="card mb-12">
                        <div class="card-header">
                            <i class="fa fa-plug"></i>  Etat des serveurs
                        </div>
                        <div class="card-body">
                            <h2><span class="badge badge-pill badge-success">Web</span>
                                <span class="badge badge-pill badge-success">VPN</span>
                                <span class="badge badge-pill badge-success">Supervision</span>
                                <span class="badge badge-pill badge-success">UPS</span>
                                <span class="badge badge-pill badge-success">NAS</span></h2>

                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-12">
                        <div class="card-header">
                            <i class="fa fa-external-link"></i>  Accès rapide
                        </div>
                        <div class="card-body">
                            <h1><span class="badge badge-success">Web</span>
                                <span class="badge badge-success">VPN</span>
                                <span class="badge badge-success">Supervision</span>
                                <span class="badge badge-success">UPS</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        /*$ip="192.168.0.1";
        $ping = exec("ping -n 1 $ip");
        if(preg_match('/timed out/i', $ping))
        {
            echo '<span style="color: red">NON</span>';
        }
        else
        {
            echo '<span style="color: green">OUI</span>';
        }*/ ?>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/footer.php"); ?>


</body>
</html>