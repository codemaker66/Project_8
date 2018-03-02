<?php

require_once(__DIR__ . "/../dbManager.php");

class Model extends Manager {


	public function getAll()
	{
		$db = $this->dbConnect();

		//Une connexion SQL doit être ouverte avant cette ligne...
        $retour_total= $db->query('SELECT COUNT(*) AS total FROM chapters'); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total= $retour_total->fetch(); //On range retour sous la forme d'un tableau.
        $total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
        return $total;


	}



	 public function getChapters($premiereEntree, $messagesParPage)
	{ 

		$db = $this->dbConnect();

		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapters ORDER BY creation_date  LIMIT '.$premiereEntree.', '.$messagesParPage.'');
		$req->execute(array($premiereEntree, $messagesParPage));
		return $req;

	}


	 public function getChapter($chapterId)
	{

		$db = $this->dbConnect();

		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapters WHERE id = ?');
		$req->execute(array($chapterId));

		return $req;

	}


	 public function getComments($chapterId)
	{

		$db = $this->dbConnect();

		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE chapter_id = ? ORDER BY comment_date');
		$comments->execute(array($chapterId));

		return $comments;



	}


	public function postComment($chapterId, $author, $comment)
	{
	    $db = $this->dbConnect();
	    $comments = $db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date, report_nb) VALUES(?, ?, ?, NOW(), 0)');
	    $affectedLines = $comments->execute(array($chapterId, $author, $comment));

	    return $affectedLines;
	}

	public function testComments($id)
	{

		$db = $this->dbConnect();

		$comments = $db->prepare('SELECT id, report_nb FROM comments WHERE id = ?');
		$comments->execute(array($id));
		$test = $comments->fetch();
		return $test;

	}

	public function deleteComment($id)
	{
		$db = $this->dbConnect();

		$comments = $db->prepare('DELETE FROM comments WHERE id = ?');
		$comments->execute(array($id));
	}

	public function addReport($id)
	{
		$db = $this->dbConnect();

		$comments = $db->prepare('UPDATE comments SET report_nb = report_nb + 1 WHERE id = ?');
		$comments->execute(array($id));


	}

}