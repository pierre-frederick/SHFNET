<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions

if($_POST['type']=="banner") {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            deleteBanners($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Banner supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}
else {
    echo "Error !";
}
