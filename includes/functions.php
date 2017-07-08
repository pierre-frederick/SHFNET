<?php


function ConnexionDB() //Fonction permettant de se connecter à une base de donnée 
{
	try
	{
		$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$BDD = new PDO('pgsql:host=localhost;dbname=site', 'postgres', 'root', $options);

	}
	catch (PDOException $e)
	{
		throw new Exception($e->getMessage(), $e->getCode());
	}

	return $BDD;
}

function ListeCategories(PDO $BDD)
{
	$request = $BDD->query('SELECT * FROM site.public.categorie;');
	return $request->fetchAll(PDO::FETCH_ASSOC);

}


function GetArticle(PDO $BDD, $id)
{
	$request = $BDD->prepare('SELECT * FROM site.public.articles WHERE id = ?');
	$request->execute(array($id));
	return $request->fetch(PDO::FETCH_ASSOC);
}

function LastArticles(PDO $BDD, $categorie = null, $p = 1)
{
	if($categorie == null)
	{
		$request = $BDD->prepare('SELECT author, date, title, subtitle, id FROM site.public.articles ORDER BY date DESC LIMIT ? OFFSET ?');
		$request->execute(array(4, ($p-1)*4));
	}
	else
	{
		$request = $BDD->prepare('SELECT author, date, title, subtitle, id, categorie FROM site.public.articles WHERE categorie = ? ORDER BY date DESC LIMIT ? OFFSET ?');
		$request->execute(array($categorie, 4, ($p-1)*4));
	}
	return $request->fetchAll(PDO::FETCH_ASSOC);

}



?> 
