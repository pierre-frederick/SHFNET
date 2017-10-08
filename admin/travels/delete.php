<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions

if($_POST['type']=="banner") {

try {
$bdd = connexionDB();
if(isset($bdd)) {
$id=$_POST['id'];
deleteVgBanners($bdd, $id);
} else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
echo "Banner supprimé !";
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
            deleteVgCategorie($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Catégorie supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="picture") {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            deleteVgPhoto($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Image supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}


elseif($_POST['type']=="map") {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            $spots=getVgSpotByIdMap($bdd, $id);
            foreach ($spots as $spot) {
                deleteVgSpot($bdd, $spot['id']);
            }
            deleteVgMap($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Carte supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="voyage") {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $id=$_POST['id'];
            $categories=getAllVgCategorieVoyageById($bdd, $id);
            foreach ($categories as $categorie) {
                deleteVgVoyageCategorie($bdd, $categorie['id']);
            }
            $photos=getAllVgVoyagePhotoById($bdd, $id);
            foreach ($photos as $photo) {
                deleteVgVoyagePhoto($bdd, $photo['id']);
            }
            deleteVgVoyage($bdd, $id);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Carte supprimé !";
        $bdd = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}
else {
    echo "Erreur de type !";
}
