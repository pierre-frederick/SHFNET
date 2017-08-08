<?php

$PROFILE_DEV = false;
function ConnexionDB() //Fonction permettant de se connecter à une base de donnée 
{
	try
	{
		$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$BDD = new PDO('pgsql:host=localhost;dbname=site', 'postgres', 'root', $options);

	}
	catch (PDOException $e)
	{
	    //DEV
		//throw new Exception($e->getMessage(), $e->getCode());
		//PROD
        //print "Erreur !: " . $e->getMessage() . "<br/>";
        $BDD =null;
    }

	return $BDD;
}

function ListeCategoriesArticle(PDO $BDD)
{
	$request = $BDD->query('SELECT * FROM site.public.categorie_article;');
	return $request->fetchAll(PDO::FETCH_ASSOC);

}

function GetCategorieArticle(PDO $BDD, $id)
{
    $request = $BDD->query('SELECT * FROM site.public.categorie_article WHERE id="\'.$id.\'"');
    return $request->fetchAll(PDO::FETCH_ASSOC);

}


function GetArticle(PDO $BDD, $id)
{
	$request = $BDD->prepare('SELECT * FROM site.public.articles WHERE id = ?');
	$request->execute(array($id));
	return $request->fetch(PDO::FETCH_ASSOC);
}


function LastArticles(PDO $BDD, $categorie = null, $p = 1, $n=4)
{
	if($categorie == null)
	{
		$request = $BDD->prepare('SELECT author, date, title, subtitle, id, categorie, img, legend, contenu FROM site.public.articles ORDER BY date DESC LIMIT ? OFFSET ?');
		$request->execute(array($n, ($p-1)*$n));
	}
	else
	{
		$request = $BDD->prepare('SELECT author, date, title, subtitle, id, categorie, img, legend, contenu FROM site.public.articles WHERE categorie = ? ORDER BY date DESC LIMIT ? OFFSET ?');
		$request->execute(array($categorie, $n, ($p-1)*$n));
	}
	return $request->fetchAll(PDO::FETCH_ASSOC);

}

function GetProject(PDO $BDD, $id)
{
    $request = $BDD->prepare('SELECT * FROM site.public.projects WHERE id = ?');
    $request->execute(array($id));
    return $request->fetch(PDO::FETCH_ASSOC);
}


function LastProjects(PDO $BDD, $subject = null, $categorie = null, $p = 1)
{
    if($subject == null) {
        $request = $BDD->prepare('SELECT date, title, subtitle, id, contenu, img, legend, subject, id_categorie FROM site.public.projects ORDER BY date DESC LIMIT ? OFFSET ?');
        $request->execute(array(3, ($p-1)*3));
    }
    else
    {
    	if($categorie == null) {
            $request = $BDD->prepare('SELECT date, title, subtitle, id, contenu, img, legend, subject, id_categorie FROM site.public.projects WHERE subject = ? ORDER BY date DESC LIMIT ? OFFSET ?');
            $request->execute(array($subject, 4, ($p-1)*4));
		}
		else {
            $request = $BDD->prepare('SELECT date, title, subtitle, id, contenu, img, legend, subject, id_categorie FROM site.public.projects WHERE subject = ? AND categorie = ? ORDER BY date DESC LIMIT ? OFFSET ?');
            $request->execute(array($subject, $categorie, 4, ($p-1)*4));
        }

    }
    return $request->fetchAll(PDO::FETCH_ASSOC);

}

function ListeCategoriesProjects(PDO $BDD, $subject = null)
{
    $request = $BDD->prepare('SELECT * FROM site.public.categorie_projects WHERE subject = ? ORDER BY name;');
    $request->execute(array($subject));
    return $request->fetchAll(PDO::FETCH_ASSOC);

}

function GetCategorieProjects(PDO $BDD, $id)
{
    $request = $BDD->query('SELECT * FROM site.public.categorie_projects WHERE id="\'.$id.\'"');
    return $request->fetchAll(PDO::FETCH_ASSOC);

}

function LastBanners(PDO $BDD)
{
    $request = $BDD->query('SELECT * FROM site.public.banners ORDER BY date DESC LIMIT 5');
    return $request->fetchAll(PDO::FETCH_ASSOC);
}
