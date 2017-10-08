<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/functions.php'; // fichier des fonctions

setlocale(LC_ALL, 'fr_FR.UTF-8');

if($_POST['type']=="favoris") {
try {
    $bdd = connexionDB();
    if(isset($bdd)) {
        $id=$_POST['id'];
        deleteFavoris($bdd, $id);
    } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
    echo "Favori supprimé !";
    $bdd = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

}

elseif($_POST['type']=="catFavoris") {
    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            $favoris = getFavorisByCategorie($bdd, $id);
            foreach ($favoris as $favori) {
                deleteFavoris($bdd, $favori['id']);
            }
            deleteCatFavoris($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Catégorie supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

else {
    echo "Erreur de type !";
}
?>