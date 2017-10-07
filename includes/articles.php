<?php setlocale(LC_ALL, 'fr_FR.UTF-8');

$bdd = connexionDB();

if(isset($bdd)) {
    $ListeCategories = getAllCategoriesArticle($bdd);
    $ListeCategoriesElec = getCategoriesArticleBySubject($bdd, "elec");
    $ListeCategoriesInfo = getCategoriesArticleBySubject($bdd,"info");
    $idCategorie = null;



if(isset($_GET['p']) && $_GET['p'] > 0) {
    $page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
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
		    $header['title'] = 'Catégorie : <a href="blog.php" class="btn btn-default"> '. $categorie['name'] .' <i class="fa fa-times-circle"></i></a>  <hr>';
		    $idCategorie = $categorie['id'];
		}
	}

}

else if(isset($_GET['a']))
{
    $getCategorie = null;
    $idArticle = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
    $article = getArticle($bdd, $idArticle);
        if($article == null) {
            header('Location: /error/404.php');
        }

    $metas['og:type'] = 'article';
    $metas['og:image'] = $article['img'];
    $metas['author'] = $article['author'];
    $metas['og:author'] = $article['author'];
    $metas['og:title'] = $article['title'];
    $metas['og:description'] = $article['subtitle'];
    $date = new DateTime($article['date_article']);
}
}
