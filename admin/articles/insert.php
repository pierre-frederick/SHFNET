<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions


if($_POST['type']=="article" && isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['contenu']) && isset($_POST['author']) && isset($_POST['date_article']) && isset($_POST['path']) && isset($_POST['legend']) && isset($_POST['tags'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $subtitle=filter_var($_POST['subtitle'], FILTER_SANITIZE_STRING);
            $description=$_POST['contenu'];
            $author=filter_var($_POST['author'], FILTER_SANITIZE_STRING);
            $date_article=$_POST['date_article'];
            $path=$_POST['path'];
            $legend=filter_var($_POST['legend'], FILTER_SANITIZE_STRING);
            setArticle($bdd, $title, $subtitle, $description, $author, $date_article, $path, $legend);
            $ArticleInsert = getLastArticle($bdd);
            $tags = json_decode($_POST['tags']);
            foreach ($tags as $tag) {
                setArticleTag($bdd, $ArticleInsert['id'], $tag);
            }

        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Article ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="categorie" && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['path']) && isset($_POST['legend']) && isset($_POST['subject'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $description=filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $path=$_POST['path'];
            $legend=filter_var($_POST['legend'], FILTER_SANITIZE_STRING);
            $subject=filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
            setCategorieArticle($bdd, $name, $description, $path, $legend, $subject);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Catégorie ajouté !";
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