<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions


if($_POST['type']=="banner" && isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['link'])  && isset($_POST['urlmedia'])  && isset($_POST['dateBanner'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $subtitle=filter_var($_POST['subtitle'], FILTER_SANITIZE_STRING);
            $link=filter_var($_POST['link'], FILTER_SANITIZE_STRING);
            $urlmedia=filter_var($_POST['urlmedia'], FILTER_SANITIZE_STRING);
            $date=$_POST['dateBanner'];
            setVgBanners($bdd, $title, $subtitle, $link, $urlmedia, $date);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Banner ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="categorie" && isset($_POST['name']) && isset($_POST['description'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $description=filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            setVgCategorie($bdd, $name, $description);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Catégorie ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="picture" && isset($_POST['name']) && isset($_POST['link']) && isset($_POST['description']) && isset($_POST['id_vg_spot'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $link=filter_var($_POST['link'], FILTER_SANITIZE_STRING);
            $description=filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $id_vg_spot=$_POST['id_vg_spot'];
            setVgPhoto($bdd, $name, $link, $description, $id_vg_spot);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Image ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="map" && isset($_POST['name']) && isset($_POST['lat']) && isset($_POST['lng']) && isset($_POST['zoom']) && isset($_POST['arraySpot'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $lat=$_POST['lat'];
            $lng=$_POST['lng'];
            $zoom=filter_var($_POST['zoom'], FILTER_SANITIZE_NUMBER_INT);
            setVgMap($bdd, $name, $lat, $lng, $zoom);
            $MapInsert = getLastVgMap($bdd);
            $tags = json_decode($_POST['arraySpot']);
            foreach ($tags as $tag) {
                setVgSpot($bdd, $tag[0], $tag[1], $tag[2], $tag[5], $MapInsert['id'], $tag[3], $tag[4] );
            }
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Carte ajoutée !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="voyage" && isset($_POST['name']) && isset($_POST['place']) && isset($_POST['contenu']) && isset($_POST['address']) && isset($_POST['city'])&& isset($_POST['country'])&& isset($_POST['date_debut'])&& isset($_POST['date_fin'])&& isset($_POST['tags'])&& isset($_POST['pictures']) && isset($_POST['id_vg_map'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $place=filter_var($_POST['place'], FILTER_SANITIZE_STRING);
            $contenu=$_POST['contenu'];
            $address=$_POST['address'];
            $city=filter_var($_POST['city'], FILTER_SANITIZE_STRING);
            $country=filter_var($_POST['country'], FILTER_SANITIZE_STRING);
            $date_debut=$_POST['date_debut'];
            $date_fin=$_POST['date_fin'];
            $id_vg_map=$_POST['id_vg_map'];
            $picture_on_top=$_POST['picture_on_top'];
            setVgVoyage($bdd, $name, $place, $contenu, $address, $city, $country, $date_debut, $date_fin, $id_vg_map, $picture_on_top);
            $VoyageInsert = getLastVgVoyage($bdd);
            $tags = json_decode($_POST['tags']);
            foreach ($tags as $tag) {
                setVgCategorieVoyage($bdd, $VoyageInsert['id'], $tag);
            }
            $pictures = json_decode($_POST['pictures']);
            foreach ($pictures as $picture) {
                setVgVoyagePhoto($bdd, $picture, $VoyageInsert['id']);
            }
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Voyage ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}


else {
    echo "Erreur de format !";
}


