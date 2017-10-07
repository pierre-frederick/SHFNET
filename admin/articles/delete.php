<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions


if($_POST['type']=="article") {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            $liens = getCategorieArticle($bdd, $id);
            foreach ($liens as $lien){
                deleteCatArticle($bdd, $lien['id']);
            }
            deleteArticle($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Article supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="categorie") {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            deleteArticleCategorie($bdd, $id);
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