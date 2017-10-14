<?php
require_once 'identifiants.php'; // fichier des identifiants BDD

$PROFILE_DEV = true;
function connexionDB() //Fonction permettant de se connecter à une base de donnée
{
	try
	{
		$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$BDD = new PDO(ADRESSE_BDD, LOGIN_BDD, PASS_BDD, $options);

	}
	catch (PDOException $e)
	{
	    //DEV
		throw new Exception($e->getMessage(), $e->getCode());
		//PROD
        print "Erreur !: " . $e->getMessage() . "<br/>";
        $BDD =null;
    }

	return $BDD;
}


/*
 * **************************** ARTICLES *******************************************
 */

function getAllArticle(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.articles;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function getArticle(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.articles WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}


function getAllCategoriesArticle(PDO $BDD){
	$request = $BDD->query('SELECT * FROM shfnet.public.categorie_article ORDER BY subject ASC;');
	return $request->fetchAll(PDO::FETCH_ASSOC);
}


function getCategoriesArticleBySubject(PDO $BDD, $subject){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.categorie_article WHERE subject = ?;');
    $request->execute(array($subject));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getCategoriesArticleById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.categorie_article WHERE id = ?;');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}


function getCategorieArticle(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.cat_articles WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function getLastArticles(PDO $BDD, $limit){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.articles ORDER BY date_article DESC LIMIT ?');
    $request->execute(array($limit));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function getArticlesByCategorie(PDO $BDD, $idCategorie,  $page, $offset){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.articles INNER JOIN shfnet.public.cat_articles ON shfnet.public.articles.id = shfnet.public.cat_articles.id WHERE id_categorie_article = ? ORDER BY date_article DESC LIMIT ? OFFSET ?');
    $request->execute(array($idCategorie, $offset, ($page-1)*$offset));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getArticleByPage(PDO $BDD, $page, $offset){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.articles ORDER BY date_article DESC LIMIT ? OFFSET ?');
    $request->execute(array( $offset, ($page-1)*$offset));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function deleteArticle(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.articles WHERE id = ?');
    $request->execute(array($id));
}

function deleteCatArticle(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.cat_articles WHERE id = ?');
    $request->execute(array($id));
}

function deleteArticleCategorie(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.categorie_article WHERE id = ?');
    $request->execute(array($id));
}

function setCategorieArticle(PDO $BDD, $name, $description, $path, $legend, $subject){
    $request = $BDD->prepare('INSERT INTO shfnet.public.categorie_article(name, description, img, legend, subject) VALUES (:name, :description, :path, :legend, :subject)');
    $request->execute(array('name' => $name, 'description' => $description, 'path' => $path, 'legend' => $legend, 'subject' => $subject));
}

function setArticle(PDO $BDD, $title, $subtitle, $contenu, $author, $date_article, $path, $legend){
    $request = $BDD->prepare('INSERT INTO shfnet.public.articles(title, subtitle, contenu, author, date_article, img, legend) VALUES (:title, :subtitle, :contenu, :author, :date_article, :img, :legend)');
    $request->execute(array('title' => $title, 'subtitle' => $subtitle, 'contenu' => $contenu, 'author' => $author, 'date_article' => $date_article, 'img' => $path, 'legend' => $legend));
}

function getLastArticle(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.articles ORDER BY id DESC LIMIT 1');
    return $request->fetch(PDO::FETCH_ASSOC);
}

function setArticleTag(PDO $BDD, $id_article, $id_categorie_article){
    $request = $BDD->prepare('INSERT INTO shfnet.public.cat_articles(id, id_categorie_article) VALUES (:id_article, :id_categorie_article)');
    $request->execute(array('id_article' => $id_article, 'id_categorie_article' => $id_categorie_article));
}

/*
 * **************************** PROJETS *******************************************
 */

function getAllProject(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.projects');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getProject(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.projects WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCategoriesProject(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.categorie_article;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getCategoriesProjectBySubject(PDO $BDD, $subject){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.categorie_article WHERE subject = ?;');
    $request->execute(array($subject));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getCategorieProject(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.cat_projects WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getLastProjects(PDO $BDD, $limit){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.projects ORDER BY date_project DESC LIMIT ?');
    $request->execute(array($limit));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function getProjectsBySubjectAndCategory(PDO $BDD, $idCategorie, $subject,  $page, $offset){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.projects 
INNER JOIN shfnet.public.cat_projects ON shfnet.public.projects.id = shfnet.public.cat_projects.id  
INNER JOIN shfnet.public.categorie_article ON shfnet.public.cat_projects.id_categorie_article = shfnet.public.categorie_article.id 
WHERE id_categorie_article = ? AND subject = ? ORDER BY date_project DESC LIMIT ? OFFSET ?');
    $request->execute(array($idCategorie, $subject, $offset, ($page-1)*$offset));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getProjectsBySubjectAndNameCategory(PDO $BDD, $categorie, $subject,  $page, $offset){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.projects 
INNER JOIN shfnet.public.cat_projects ON shfnet.public.projects.id = shfnet.public.cat_projects.id  
INNER JOIN shfnet.public.categorie_article ON shfnet.public.cat_projects.id_categorie_article = shfnet.public.categorie_article.id 
WHERE categorie_article.name = ? AND subject = ? ORDER BY date_project DESC LIMIT ? OFFSET ?');
    $request->execute(array($categorie, $subject, $offset, ($page-1)*$offset));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function getProjectsBySubject(PDO $BDD, $subject,  $page, $offset){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.projects 
INNER JOIN shfnet.public.cat_projects ON shfnet.public.projects.id = shfnet.public.cat_projects.id  
INNER JOIN shfnet.public.categorie_article ON shfnet.public.cat_projects.id_categorie_article = shfnet.public.categorie_article.id 
WHERE subject = ? ORDER BY date_project DESC LIMIT ? OFFSET ?');
    $request->execute(array($subject, $offset, ($page-1)*$offset));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function deleteProject(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.projects WHERE id = ?');
    $request->execute(array($id));
}

function deleteCatProject(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.cat_projects WHERE id = ?');
    $request->execute(array($id));
}

function setProject(PDO $BDD, $title, $subtitle, $contenu, $date_project, $path, $legend){
    $request = $BDD->prepare('INSERT INTO shfnet.public.projects(title, subtitle, contenu, date_project, img, legend) VALUES (:title, :subtitle, :contenu, :date_project, :img, :legend)');
    $request->execute(array('title' => $title, 'subtitle' => $subtitle, 'contenu' => $contenu, 'date_project' => $date_project, 'img' => $path, 'legend' => $legend));
}

function getLastProject(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.projects ORDER BY id DESC LIMIT 1');
    return $request->fetch(PDO::FETCH_ASSOC);
}

function setProjectTag(PDO $BDD, $id_project, $id_categorie_article){
    $request = $BDD->prepare('INSERT INTO shfnet.public.cat_projects(id, id_categorie_article) VALUES (:id_project, :id_categorie_article)');
    $request->execute(array('id_project' => $id_project, 'id_categorie_article' => $id_categorie_article));
}

/*
 * **************************** BANNERS *******************************************
 */

function getAllBanners(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.banners ORDER BY date_banner DESC');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getLastBanners(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.banners ORDER BY date_banner DESC LIMIT 5');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function deleteBanners(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.banners WHERE id = ?');
    $request->execute(array($id));
}

function setBanners(PDO $BDD, $title, $subtitle, $link, $mediatype, $urlmedia, $date){
    $request = $BDD->prepare('INSERT INTO shfnet.public.banners(title, subtitle, link, mediatype, urlmedia, date_banner) VALUES (:title, :subtitle, :link, :mediatype, :urlmedia, :date_banner)');
    $request->execute(array('title' => $title, 'subtitle' => $subtitle, 'link' => $link, 'mediatype' => $mediatype, 'urlmedia' => $urlmedia, 'date_banner' => $date, ));
}

/*
 * **************************** FAVORIS *******************************************
 */

function getAllCategorieFavoris(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.categorie_favoris;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function setCatFavoris(PDO $BDD, $name){
    $request = $BDD->prepare('INSERT INTO shfnet.public.categorie_favoris(name) VALUES (:name)');
    $request->execute(array('name' => $name));
}

function deleteCatFavoris(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.categorie_favoris WHERE id = ?');
    $request->execute(array($id));
}

function getFavorisById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.favoris WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getFavorisByCategorie(PDO $BDD, $id_categorie){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.favoris WHERE id_categorie_favoris = ?');
    $request->execute(array($id_categorie));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function setFavoris(PDO $BDD, $nom, $url, $description, $id_categorie){
    $request = $BDD->prepare('INSERT INTO shfnet.public.favoris(name, link, description, id_categorie_favoris) VALUES (:name, :link, :description, :categorie_id)');
    $request->execute(array('name' => $nom, 'description' => $description, 'link' => $url, 'categorie_id' => $id_categorie));
}

function deleteFavoris(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.favoris WHERE id = ?');
    $request->execute(array($id));
}

function getDomain($url){
    $domain = parse_url($url, PHP_URL_HOST);
    return $domain;
}

/*
 * **************************** BASE DOCUMENTAIRE *******************************************
 */

function getAllBdTag(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.bd_tag;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllBdMagazines(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.bd_magazines;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllBdArticle(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.bd_articles ORDER BY id DESC ;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function deleteBdArticle(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.bd_articles WHERE id = ?');
    $request->execute(array($id));
}

function deleteBdMagazine(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.bd_magazines WHERE id = ?');
    $request->execute(array($id));
}

function deleteBdTag(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.bd_tag WHERE id = ?');
    $request->execute(array($id));
}

function deleteBdArticleTag(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.bd_article_tag WHERE id = ?');
    $request->execute(array($id));
}

function getBdArticleById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.bd_articles WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getBdLastArticle(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.bd_articles ORDER BY id DESC LIMIT 1');
    return $request->fetch(PDO::FETCH_ASSOC);
}


function getBdMagazineById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.bd_magazines WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getBdTagById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.bd_tag WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getBdArticleTagById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.bd_article_tag WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function setBdArticle(PDO $BDD, $name, $contenu, $author, $id_bd_magazines){
    $request = $BDD->prepare('INSERT INTO shfnet.public.bd_articles(name, contenu, author, id_bd_magazines) VALUES (:name, :contenu, :author, :id_bd_magazines)');
    $request->execute(array('name' => $name, 'contenu' => $contenu, 'author' => $author, 'id_bd_magazines' => $id_bd_magazines));
}

function updateBdArticle(PDO $BDD, $id, $name, $contenu, $author){
    $request = $BDD->prepare('UPDATE shfnet.public.bd_articles SET name= :name, contenu= :contenu, author= :contenu WHERE id= :id');
    $request->execute(array('id' => $id, 'name' => $name, 'contenu' => $contenu, 'author' => $author));
}

function setBdMagazine(PDO $BDD, $titre, $numero, $date_magazine){
    $request = $BDD->prepare('INSERT INTO shfnet.public.bd_magazines(titre, numero, date_magazine) VALUES (:titre, :numero, :date_magazine)');
    $request->execute(array('titre' => $titre, 'numero' => $numero, 'date_magazine' => $date_magazine));
}

function setBdTag(PDO $BDD, $name, $description){
    $request = $BDD->prepare('INSERT INTO shfnet.public.bd_tag(name, description) VALUES (:name, :description)');
    $request->execute(array('name' => $name, 'description' => $description));
}

function setBdArticleTag(PDO $BDD, $id_article, $id_bd_tag){
    $request = $BDD->prepare('INSERT INTO shfnet.public.bd_article_tag(id, id_bd_tag) VALUES (:id_article, :id_bd_tag)');
    $request->execute(array('id_article' => $id_article, 'id_bd_tag' => $id_bd_tag));
}


/*
 * **************************** SITE VOYAGE : categories *******************************************
 */

function getAllVgVoyages(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_voyage;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllVgCategorie(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_categorie;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function setVgCategorie(PDO $BDD, $name, $description){
    $request = $BDD->prepare('INSERT INTO shfnet.public.vg_categorie(name, description) VALUES (:name, :description)');
    $request->execute(array('name' => $name, 'description' => $description));
}

function setVgCategorieVoyage(PDO $BDD, $id, $id_vg_categorie){
    $request = $BDD->prepare('INSERT INTO shfnet.public.vg_categorie_voyage(id, id_vg_categorie) VALUES (:id, :id_vg_categorie)');
    $request->execute(array('id' => $id, 'id_vg_categorie' => $id_vg_categorie));
}

function deleteVgCategorie(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.vg_categorie WHERE id = ?');
    $request->execute(array($id));
}


function getVgCategorieById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.vg_categorie WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

/*
 * **************************** SITE VOYAGE : voyages *******************************************
 */

function getVgVoyageById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.vg_voyage WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getAllVgCategorieVoyage(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_categorie_voyage;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllVgCategorieVoyageById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.vg_categorie_voyage WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllVgVoyagePhotoById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.vg_voyage_photo WHERE id_vg_voyage = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getVgPhotoById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.vg_pictures WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getAllVgPhoto(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_pictures ORDER BY id DESC');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function setVgVoyage(PDO $BDD, $name, $place, $contenu, $address, $city, $country, $date_debut, $date_fin, $id_vg_map, $picture_on_top){
    $request = $BDD->prepare('INSERT INTO shfnet.public.vg_voyage(name, place, content, address, city, country, date_debut, date_fin, id_vg_map, picture_on_top) VALUES (:name, :place, :content, :address, :city, :country, :date_debut, :date_fin, :id_vg_map, :picture_on_top)');
    $request->execute(array('name' => $name, 'place' => $place, 'content' => $contenu, 'address' => $address, 'city' => $city, 'country' => $country, 'date_debut' => $date_debut, 'date_fin' => $date_fin, 'id_vg_map'=> $id_vg_map, 'picture_on_top' => $picture_on_top));
}

function getLastVgVoyage(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_voyage ORDER BY id DESC LIMIT 1');
    return $request->fetch(PDO::FETCH_ASSOC);
}

function setVgVoyagePhoto(PDO $BDD, $id, $id_vg_voyage){
    $request = $BDD->prepare('INSERT INTO shfnet.public.vg_voyage_photo(id, id_vg_voyage) VALUES (:id, :id_vg_voyage)');
    $request->execute(array('id' => $id, 'id_vg_voyage' => $id_vg_voyage));
}

function setVgPhoto(PDO $BDD, $name, $link, $description, $spot){
    $request = $BDD->prepare('INSERT INTO shfnet.public.vg_pictures(name, link, description, id_vg_spot) VALUES (:name, :link, :description, :id_vg_spot)');
    $request->execute(array('name' => $name, 'link' => $link, 'description' => $description, 'id_vg_spot' => $spot));
}

function deleteVgPhoto(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.vg_pictures WHERE id = ?');
    $request->execute(array($id));
}

function deleteVgVoyage(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.vg_voyage WHERE id = ?');
    $request->execute(array($id));
}

function deleteVgVoyagePhoto(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.vg_voyage_photo WHERE id = ?');
    $request->execute(array($id));
}

function deleteVgVoyageCategorie(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.vg_categorie_voyage WHERE id = ?');
    $request->execute(array($id));
}

/*
 * **************************** SITE VOYAGE : banners *******************************************
 */

function getAllVgBanners(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_banners ORDER BY date_banner DESC');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getLastVgBanners(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_banners ORDER BY date_banner DESC LIMIT 5');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function deleteVgBanners(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.vg_banners WHERE id = ?');
    $request->execute(array($id));
}

function setVgBanners(PDO $BDD, $title, $subtitle, $link, $urlmedia, $date){
    $request = $BDD->prepare('INSERT INTO shfnet.public.vg_banners(title, subtitle, link, urlmedia, date_banner) VALUES (:title, :subtitle, :link, :urlmedia, :date_banner)');
    $request->execute(array('title' => $title, 'subtitle' => $subtitle, 'link' => $link, 'urlmedia' => $urlmedia, 'date_banner' => $date));
}


/*
 * **************************** SITE VOYAGE : map *******************************************
 */


function getAllVgMaps(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_map;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getVgMapById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.vg_map WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function setVgMap(PDO $BDD, $name, $lat, $lng, $zoom){
    $request = $BDD->prepare('INSERT INTO shfnet.public.vg_map(name, center_lat, center_long, zoom) VALUES (:name, :center_lat, :center_long, :zoom)');
    $request->execute(array('name' => $name, 'center_lat' => $lat, 'center_long' => $lng, 'zoom' => $zoom));
}

function getLastVgMap(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_map ORDER BY id DESC LIMIT 1');
    return $request->fetch(PDO::FETCH_ASSOC);
}

function deleteVgMap(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.vg_map WHERE id = ?');
    $request->execute(array($id));
}

/*
 * **************************** SITE VOYAGE : spot *******************************************
 */

function setVgSpot(PDO $BDD, $name, $link, $address, $type, $id_vg_map, $lat, $lng){
    $request = $BDD->prepare('INSERT INTO shfnet.public.vg_spot(name, link, address, type, id_vg_map, lat, lng) VALUES (:name, :link, :address, :type, :id_vg_map, :lat, :lng)');
    $request->execute(array('name' => $name, 'link' => $link, 'address' => $address, 'type' => $type, 'id_vg_map' => $id_vg_map, 'lat' => $lat, 'lng' => $lng));
}

function deleteVgSpot(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM shfnet.public.vg_spot WHERE id = ?');
    $request->execute(array($id));
}

function getVgSpotByIdMap(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.vg_spot WHERE id_vg_map = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getVgSpotById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM shfnet.public.vg_spot WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getAllVgSpots(PDO $BDD){
    $request = $BDD->query('SELECT * FROM shfnet.public.vg_spot;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

