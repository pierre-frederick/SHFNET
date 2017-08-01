<?php
require_once '../includes/functions.php'; // fichier des fonctions
require_once '../includes/articles.php'; // fichier des fonctions

if(isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['categorie']) && isset($_POST['contenu']) && isset($_POST['date']) && isset($_POST['auteur']) && isset($_POST['legende']) ) //Si le formulaire est non vide
{
    $dossier = '../upload/articles/';
    $fichier = basename($_FILES['fic']['name']);
    $taille_maxi = 100000;
    $taille = filesize($_FILES['fic']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['fic']['name'], '.');
//Début des vérifications de sécurité...
    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
    }
    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($_FILES['fic']['tmp_name'], $dossier . $_POST['categorie'] . "/" . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            echo 'Upload effectué avec succès !';
        }
        else //Sinon (la fonction renvoie FALSE).
        {
            echo 'Echec de l\'upload !';
        }
    }
    else
    {
        echo $erreur;
    }


    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$subtitle = filter_input(INPUT_POST, 'subtitle', FILTER_SANITIZE_STRING);
    $contenu = $_POST['contenu']; //danger si application hors panneau admin
    $legende = filter_input(INPUT_POST, 'legende', FILTER_SANITIZE_STRING);
    $auteur = filter_input(INPUT_POST, 'auteur', FILTER_SANITIZE_STRING);
	//$purifier = new HTMLPurifier();
	//$editor = $purifier->purify($_POST['editor']);
		$bdd = ConnexionDB();
		$date = date("Y-m-d H:i:s");
			$qry = $bdd->prepare('INSERT INTO site.public.articles (author, date, title, subtitle , contenu, categorie, url, legende) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
			$qry->execute(array($auteur, $date, $title, $subtitle, $contenu, $_POST['categorie'], $_FILES['fic']['name'], $legende));
			header('Location: /admin/blog.php');
			exit(0);
}
//header('Location: /?error=Une erreur est survenue.');
