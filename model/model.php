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


function getChapters()
{ 

	$db = dbConnect();

	$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapters ORDER BY creation_date');

	return $req;

}


function getChapter($chapterId)
{

	$db = dbConnect();

	$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapters WHERE id = ?');
	$req->execute(array($chapterId));
	$chapter = $req->fetch();

	return $chapter;


}


function getComments($chapterId)
{

	$db = dbConnect();

	$comments = $db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE chapter_id = ? ORDER BY comment_date');
	$comments->execute(array($chapterId));

	return $comments;



}


function postComment($chapterId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($chapterId, $author, $comment));

    return $affectedLines;
}


?>