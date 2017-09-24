<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions


if($_POST['type']=="tag") {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            deleteBdTag($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Tag supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="magazine") {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            deleteBdMagazine($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Magazine supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="article") {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            deleteBdArticle($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Article supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}
else {
    echo "Error !";
}
