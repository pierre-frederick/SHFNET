<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions

setlocale(LC_ALL, 'fr_FR.UTF-8');
try {
$bdd = connexionDB();
if(isset($bdd)) {
    $nom=$_POST['nom'];
    $url=$_POST['url'];
    $description = $_POST['description'];
    $id_categorie= $_POST['id_categorie'];
    setFavoris($bdd, $nom, $url, $description, $id_categorie);
} else {echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';}
echo "Favoris enregistré !";
$bdd = null ;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>