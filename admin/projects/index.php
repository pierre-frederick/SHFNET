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
            <li class="breadcrumb-item active">Gestion site web</li>
            <li class="breadcrumb-item">Projets</li>
        </ol>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Gestion des projets</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="/admin/index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="/admin/projects/add.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter
                        un projet</a>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Sujet</th>
                                <th>Date</th>
                                <th>Titre</th>
                                <th>Sous-titre</th>
                                <th>Contenu</th>
                                <th>Image</th>
                                <th>Légende</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            setlocale(LC_ALL, 'fr_FR.UTF-8');
                            $bdd = ConnexionDB();
                            if(isset($bdd)) {
                                $projects = getAllProjects($bdd);
                                if(!empty($projects)) {
                                    foreach($projects as $project) {?>

                                        <tr>
                                            <td><?php echo $project['id']?></td>
                                            <td><?php echo $project['subject']?></td>
                                            <td><?php $date = strtotime($project['date']); echo "Le " . date("d-m-Y", $date) . " à " . date("H:i", $date); ?>?></td>
                                            <td><?php echo $project['title']?></td>
                                            <td><?php echo $project['subtitle']?></td>
                                            <td><?php echo $project['contenu']?></td>
                                            <td><?php echo $project['img']?></td>
                                            <td><?php echo $project['legend']?></td>
                                            <td><a class="delete btn btn-danger" data-toggle="modal" data-id="/admin/projects/delete.php?id=<?php echo $banner['id']?>" data-target="#deleteModal"><i class="fa fa-times-circle"></i></a>
                                                <a href="/admin/projects/edit.php?id=<?php echo $banner['id']?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
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

<?php include($_SERVER['DOCUMENT_ROOT'] . "/admin/elements/footer.php"); ?>

<script>
    var url;
    $(document).on("click", ".delete", function () {
        url = $(this).data('id');
    });
</script>

</body>
</html>