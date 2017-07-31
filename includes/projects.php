<?php setlocale(LC_ALL, 'fr_FR.UTF-8');

$bdd = ConnexionDB();



$header = array('img' => 'home-bg.jpg', 'title' => '<h1>Projets d\'électronique</h1><hr class="small"><span class="subheading">blog de shfnet</span>');
$metas = array('author' => 'Pierre-Frederick DENYS', 'description' => 'Blog de shfnet', 'og:type' => 'website', 'og:author' => 'Pierre-Frederick DENYS', 'og:image' => 'https://blog.isenengineering.fr/img/home-bg.jpg', 'og:description' => 'Blog de shfnet', 'og:site_name' => 'Blog');
$idCategorie = null;


if(isset($_GET['p']) && $_GET['p'] > 0)
    $page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);

else
    $page=1;


if(isset($_GET['s']))
{
    $subject = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);
    $ListeCategoriesProjects = ListeCategoriesProjects($bdd, $subject);
    $getCategorie = null;
}


else if(isset($_GET['s']) && isset($_GET['c']))
{
    $getCategorie = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);
    $ListeCategoriesProjects = ListeCategoriesProjects($bdd, $subject);

}
else if(isset($_GET['a']))
{
    $idArticle = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
    $project = GetProject($bdd, $idProject);
    if($article == null)
        //header('Location: /');

    foreach($ListeCategories as $categorie)
    {
        if($categorie['id'] == $article['categorie'])
        {
            if($categorie['img'] != null)
                $header['img'] = 'categorie/'.$categorie['img'];
            $idCategorie = $categorie['id'];
        }
    }
    $metas['og:type'] = 'article';
    $metas['og:image'] = 'https://shfnet.fr/img/'.$header['img'];
    $metas['author'] = $article['author'];
    $metas['og:author'] = $article['author'];
    $metas['og:title'] = $article['title'];
    $metas['og:description'] = $article['subtitle'];

    $date = new DateTime($article['date']);
    $header['title'] = '<h1 class="post-title">'.$article['title'].'</h1><h2 class="post-subtitle text-left">'.$article['subtitle'].'</h2><p class="post-meta">Posté par <a href="#" style="color: white;">'. $article['author'] .'</a> le '.strftime("%e %B %Y", $date->getTimestamp()).'</p>';
}

else {
    echo "mauvaise sélection";
}

?>
