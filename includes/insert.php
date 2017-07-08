<?php
if(isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['club']) && isset($_POST['editor'])) //Si le formulaire est non vide
{
	$club = filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING); //on rend sanitize les données rentrées
	$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$subtitle = filter_input(INPUT_POST, 'subtitle', FILTER_SANITIZE_STRING);
	//$purifier = new HTMLPurifier();
	//$editor = $purifier->purify($_POST['editor']);
		$bdd = ConnexionDB();
		$clubBlog = BlogClub($bdd, $club);
			$qry = $bdd->prepare('INSERT INTO site.article (author, club, content, title, subtitle) VALUES(?, ?, ?, ?, ?)');
			$qry->execute(array($author, $clubBlog['id'], $editor, $title, $subtitle));
			header('Location: https://shfnet.fr');
			exit(0);
}
//header('Location: /?error=Une erreur est survenue.');

?>