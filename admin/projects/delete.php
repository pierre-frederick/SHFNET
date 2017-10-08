<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions


if($_POST['type']=="project") {

    try {
        $bdd = connexionDB();
        if (isset($bdd)) {
            $id = $_POST['id'];
            $liens = getCategorieProject($bdd, $id);
            foreach ($liens as $lien) {
                deleteCatProject($bdd, $lien['id']);
            }
            deleteProject($bdd, $id);
        } else {
            echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';
        }
        echo "Projet supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
else {
    echo "Erreur de type !";
}