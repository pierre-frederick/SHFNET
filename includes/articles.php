<?php setlocale(LC_ALL, 'fr_FR.UTF-8');

$bdd = ConnexionDB();

if(isset($bdd)) {
    $ListeCategories = ListeCategoriesArticle($bdd);
    $idCategorie = null;



if(isset($_GET['p']) && $_GET['p'] > 0) {
    $page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);
}
else {
    $page=1;
}

if(isset($_GET['c']))
{
    $getCategorie = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);
    foreach($ListeCategories as $categorie)
    {
    	if($categorie['name'] == $getCategorie)
		{
		    if($categorie['img'] != null)
	                $header['img'] = 'categorie/'. $categorie['name'];
		    $header['title'] = '<h1>Catégorie</h1><hr class="small"><span class="subheading">'. $categorie['name'] .'</span>';
		    $idCategorie = $categorie['id'];
		}
	}
}

else if(isset($_GET['a']))
{
    $getCategorie = null;
    $idArticle = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
    $article = GetArticle($bdd, $idArticle);
        if($article == null) {
            header('Location: /error/404.php');
        }

    $metas['og:type'] = 'article';
    $metas['og:image'] = 'https://shfnet.fr/img/'.$header['img'];
    $metas['author'] = $article['author'];
    $metas['og:author'] = $article['author'];
    $metas['og:title'] = $article['title'];
    $metas['og:description'] = $article['subtitle'];
    $date = new DateTime($article['date']);
}
}
