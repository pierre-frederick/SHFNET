<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions

setlocale(LC_ALL, 'fr_FR.UTF-8');

if (isset($_POST['nom']) && isset($_POST['url']) && isset($_POST['description']) && isset($_POST['id_categorie'])) {

    try {
        $bdd = connexionDB();
        if (isset($bdd)) {
            $nom = $_POST['nom'];
            $url = $_POST['url'];
            $description = $_POST['description'];
            $id_categorie = $_POST['id_categorie'];
            setFavoris($bdd, $nom, $url, $description, $id_categorie);
        } else {
            echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';
        }
        echo "Favoris enregistré !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

} elseif (isset($_POST['name'])) {

    try {
        $bdd = connexionDB();
        if (isset($bdd)) {
            $name = $_POST['name'];
            setCatFavoris($bdd, $name);
        } else {
            echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';
        }
        echo "Catégorie enregistré !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }


} else {
    echo "Erreur de format !";
}

?>