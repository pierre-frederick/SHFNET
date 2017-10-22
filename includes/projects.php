<?php setlocale(LC_ALL, 'fr_FR.UTF-8');

$bdd = connexionDB();

$metas = array('author' => 'Pierre-Frederick DENYS', 'description' => 'Blog de shfnet', 'og:type' => 'website', 'og:author' => 'Pierre-Frederick DENYS', 'og:image' => '/img/shfnet.jpg', 'og:description' => 'Blog de shfnet', 'og:site_name' => 'Blog');
$idCategorie = null;


//pages
if(isset($_GET['p']) && $_GET['p'] > 0) {
    $page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);
}
else {
    $page=1;
}

//tri par sujet et catégorie
if(isset($_GET['s']) && isset($_GET['c'])) {
    $getCategorie = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);
    $subject = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);
    if ($subject =="elec") {
        $ListeCategoriesProjects = getCategoriesProjectBySubject($bdd, "elec");
    }
    elseif ($subject =="info") {
        $ListeCategoriesProjects = getCategoriesProjectBySubject($bdd, "info");
    }
}
//tri par sujet
elseif(isset($_GET['s'])) {
    $subject = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);
    if ($subject =="elec") {
        $ListeCategoriesProjects = getCategoriesProjectBySubject($bdd, "elec");
    }
    elseif ($subject =="info") {
        $ListeCategoriesProjects = getCategoriesProjectBySubject($bdd, "info");
    }
    else{
        $ListeCategoriesProjects =null;
    }
    $getCategorie = null;
}
elseif(isset($_GET['project'])) {
    $idProject = filter_input(INPUT_GET, 'project', FILTER_SANITIZE_STRING);
    $project = getProject($bdd, $idProject);
    $metas['og:type'] = 'article';
    $metas['author'] = 'Pierre-Frédérick DENYS';
    $metas['og:author'] = 'Pierre-Frédérick DENYS';
    $metas['og:title'] = $project['title'];
    $metas['og:description'] = $project['subtitle'];
    $date = new DateTime($project['date_project']);
}

else {
    header('Location: /error/404.php');
}
