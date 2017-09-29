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
    $request = $BDD->query('SELECT * FROM site.public.articles;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getArticle(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.articles WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getAllCategoriesArticle(PDO $BDD){
	$request = $BDD->query('SELECT * FROM site.public.categorie_article;');
	return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getCategorieArticle(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.categorie_article WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getLastArticles(PDO $BDD, $categorie = null, $p = 1, $n=4){
    if($categorie == null) {
        $request = $BDD->prepare('SELECT * FROM site.public.articles ORDER BY date DESC LIMIT ? OFFSET ?');
        $request->execute(array($n, ($p-1)*$n));
    }
    else {
        $request = $BDD->prepare('SELECT * FROM site.public.articles WHERE categorie = ? ORDER BY date DESC LIMIT ? OFFSET ?');
        $request->execute(array($categorie, $n, ($p-1)*$n));
    }
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

/*
 * **************************** PROJETS *******************************************
 */

function getAllProject(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.projects');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getProject(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.projects WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getLastProjects(PDO $BDD, $subject = null, $categorie = null, $p = 1){
    if($subject == null) {
        $request = $BDD->prepare('SELECT * FROM site.public.projects ORDER BY date DESC LIMIT ? OFFSET ?');
        $request->execute(array(3, ($p-1)*3));
    }
    else {
    	if($categorie == null) {
            $request = $BDD->prepare('SELECT * FROM site.public.projects WHERE subject = ? ORDER BY date DESC LIMIT ? OFFSET ?');
            $request->execute(array($subject, 4, ($p-1)*4));
		}
		else {
            $request = $BDD->prepare('SELECT * FROM site.public.projects WHERE subject = ? AND categorie = ? ORDER BY date DESC LIMIT ? OFFSET ?');
            $request->execute(array($subject, $categorie, 4, ($p-1)*4));
        }
    }
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCategoriesProjects(PDO $BDD, $subject = null){
    $request = $BDD->prepare('SELECT * FROM site.public.categorie_projects WHERE subject = ? ORDER BY name;');
    $request->execute(array($subject));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getCategorieProjects(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.categorie_projects WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}


/*
 * **************************** BANNERS *******************************************
 */

function getLastBanners(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.banners ORDER BY date DESC LIMIT 5');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function deleteBanners(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM site.public.banners WHERE id = ?');
    $request->execute(array($id));
}

/*
 * **************************** FAVORIS *******************************************
 */

function getAllCategorieFavoris(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.categorie_favoris;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function getFavorisById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.favoris WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getFavorisByCategorie(PDO $BDD, $id_categorie){
    $request = $BDD->prepare('SELECT * FROM site.public.favoris WHERE categorie_id = ?');
    $request->execute(array($id_categorie));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function setFavoris(PDO $BDD, $nom, $url, $description, $id_categorie){
    $request = $BDD->prepare('INSERT INTO site.public.favoris(name, link, description, categorie_id) VALUES (:name, :link, :description, :categorie_id)');
    $request->execute(array('name' => $nom, 'description' => $description, 'link' => $url, 'categorie_id' => $id_categorie));
}

function deleteFavoris(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM site.public.favoris WHERE id = ?');
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
    $request = $BDD->query('SELECT * FROM site.public.bd_tag;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllBdMagazines(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.bd_magazines;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllBdArticle(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.bd_articles ORDER BY id DESC ;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function deleteBdArticle(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM site.public.bd_articles WHERE id = ?');
    $request->execute(array($id));
}

function deleteBdMagazine(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM site.public.bd_magazines WHERE id = ?');
    $request->execute(array($id));
}

function deleteBdTag(PDO $BDD, $id){
    $request = $BDD->prepare('DELETE FROM site.public.bd_tag WHERE id = ?');
    $request->execute(array($id));
}

function getBdArticleById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.bd_articles WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getLastArticle(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.bd_articles ORDER BY id DESC LIMIT 1');
    return $request->fetch(PDO::FETCH_ASSOC);
}


function getBdMagazineById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.bd_magazines WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getBdTagById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.bd_tag WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getBdArticleTagById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.bd_article_tag WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function setBdArticle(PDO $BDD, $name, $contenu, $author, $id_bd_magazines){
    $request = $BDD->prepare('INSERT INTO site.public.bd_articles(name, contenu, author, id_bd_magazines) VALUES (:name, :contenu, :author, :id_bd_magazines)');
    $request->execute(array('name' => $name, 'contenu' => $contenu, 'author' => $author, 'id_bd_magazines' => $id_bd_magazines));
}

function updateBdArticle(PDO $BDD, $id, $name, $contenu, $author){
    $request = $BDD->prepare('UPDATE site.public.bd_articles SET name= :name, contenu= :contenu, author= :contenu WHERE id= :id');
    $request->execute(array('id' => $id, 'name' => $name, 'contenu' => $contenu, 'author' => $author));
}

function setBdMagazine(PDO $BDD, $titre, $numero, $date_magazine){
    $request = $BDD->prepare('INSERT INTO site.public.bd_magazines(titre, numero, date_magazine) VALUES (:titre, :numero, :date_magazine)');
    $request->execute(array('titre' => $titre, 'numero' => $numero, 'date_magazine' => $date_magazine));
}

function setBdTag(PDO $BDD, $name, $description){
    $request = $BDD->prepare('INSERT INTO site.public.bd_tag(name, description) VALUES (:name, :description)');
    $request->execute(array('name' => $name, 'description' => $description));
}

function setBdArticleTag(PDO $BDD, $id_article, $id_bd_tag){
    $request = $BDD->prepare('INSERT INTO site.public.bd_article_tag(id, id_bd_tag) VALUES (:id_article, :id_bd_tag)');
    $request->execute(array('id_article' => $id_article, 'id_bd_tag' => $id_bd_tag));
}

function getAllVgMaps(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.vg_map;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getVgMapById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.vg_map WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getAllVgVoyages(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.vg_voyage;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllVgCategorie(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.vg_categorie;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


function getVgCategorieById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.vg_categorie WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getVgVoyageById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.vg_voyage WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getAllVgCategorieVoyage(PDO $BDD){
    $request = $BDD->query('SELECT * FROM site.public.vg_categorie_voyage;');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllVgCategorieVoyageById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.vg_categorie_voyage WHERE id = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllVgVoyagePhotoById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.vg_voyage_photo WHERE id_vg_voyage = ?');
    $request->execute(array($id));
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getVgPhotoById(PDO $BDD, $id){
    $request = $BDD->prepare('SELECT * FROM site.public.vg_pictures WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}


