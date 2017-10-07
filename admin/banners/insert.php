<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions


if($_POST['type']=="banner" && isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['link']) && isset($_POST['mediatype'])  && isset($_POST['urlmedia'])  && isset($_POST['dateBanner'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $subtitle=filter_var($_POST['subtitle'], FILTER_SANITIZE_STRING);
            $link=filter_var($_POST['link'], FILTER_SANITIZE_STRING);
            $mediatype=filter_var($_POST['mediatype'], FILTER_SANITIZE_STRING);
            $urlmedia=filter_var($_POST['urlmedia'], FILTER_SANITIZE_STRING);
            $date=$_POST['dateBanner'];
            setBanners($bdd, $title, $subtitle, $link, $mediatype, $urlmedia, $date);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Banner ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

else {
    echo "Erreur de format !";
}