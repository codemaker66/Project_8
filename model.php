<?php

function dbConnect()
{

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=project_8;charset=utf8', 'root', '');
		return $db;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}


}


function getArticles()
{ 

	$db = dbConnect();

	$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles ORDER BY creation_date');

	return $req;

}


function getArticle($articleId)
{

	$db = dbConnect();

	$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles WHERE id = ?');
	$req->execute(array($articleId));
	$article = $req->fetch();

	return $article;


}


function getComments($articleId)
{

	$db = dbConnect();

	$comments = $db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE article_id = ? ORDER BY comment_date');
	$comments->execute(array($articleId));

	return $comments;



}

?>