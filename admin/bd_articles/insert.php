<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions


if($_POST['type']=="tag" && isset($_POST['name']) && isset($_POST['description'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $description=filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            setBdTag($bdd, $name, $description);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Tag ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="magazine" && isset($_POST['titre']) && isset($_POST['numero']) && isset($_POST['date_magazine'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $titre=filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
            $numero=filter_var($_POST['numero'], FILTER_VALIDATE_INT);
            $date_magazine=$_POST['date_magazine'];
            setBdMagazine($bdd, $titre, $numero, $date_magazine);
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Magazine ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

elseif($_POST['type']=="article" && isset($_POST['name']) && isset($_POST['contenu']) && isset($_POST['author']) && isset($_POST['id_bd_magazines']) && isset($_POST['tags'])) {

    try {
        $bdd = connexionDB();
        if(isset($bdd)) {
            $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $contenu=filter_var($_POST['contenu'], FILTER_SANITIZE_STRING);
            $author=filter_var($_POST['author'], FILTER_SANITIZE_STRING);
            $id_bd_magazines=filter_var($_POST['id_bd_magazines'], FILTER_VALIDATE_INT);
            setBdArticle($bdd, $name, $contenu, $author, $id_bd_magazines);
            $ArticleInsert = getLastArticle($bdd);
            $tags = json_decode($_POST['tags']);
            foreach ($tags as $tag) {
                setBdArticleTag($bdd, $ArticleInsert['id'], $tag);
            }
        } else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
        echo "Article ajouté !";
        $bdd = null ;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}
else {
    $array1="a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}";
    $array2=unserialize($array1);
    var_dump($array2) ;
    //echo "error";
}

?>