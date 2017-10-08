<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions


if($_POST['type']=="project" && isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['contenu']) && isset($_POST['date_project']) && isset($_POST['path']) && isset($_POST['legend']) && isset($_POST['tags'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $subtitle=filter_var($_POST['subtitle'], FILTER_SANITIZE_STRING);
            $description=$_POST['contenu'];
            $date_article=$_POST['date_project'];
            $path=$_POST['path'];
            $legend=filter_var($_POST['legend'], FILTER_SANITIZE_STRING);
            setProject($bdd, $title, $subtitle, $description, $date_article, $path, $legend);
            $ArticleInsert = getLastProject($bdd);
            $tags = json_decode($_POST['tags']);
            foreach ($tags as $tag) {
                setProjectTag($bdd, $ArticleInsert['id'], $tag);
            }

        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Projet ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

else {
    echo "Erreur de format !";
}

?>