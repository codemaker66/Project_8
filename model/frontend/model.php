<?php

require(__DIR__ . "/../dbManager.php");

class Model extends Manager {


	private $_db;

    public function __construct()
    {
      
      $this->_db = $this->dbConnect();

    }


	public function getAllRows()
	{
		
		//Une connexion SQL doit être ouverte avant cette ligne...
        $retour_total= $this->_db->query('SELECT COUNT(*) AS total FROM chapters'); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total= $retour_total->fetch(); //On range retour sous la forme d'un tableau.
        $total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
        return $total;

	}



	 public function getChapters($firstEntry, $chaptersPerPage)
	{ 
		$req = $this->_db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(edit_date, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM chapters ORDER BY creation_date_fr  LIMIT '.$firstEntry.', '.$chaptersPerPage.'');
		$req->execute(array($firstEntry, $chaptersPerPage));
		return $req;

	}


	 public function getChapter($chapterId)
	{

		

		$req = $this->_db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(edit_date, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM chapters WHERE id = ?');
		$req->execute(array($chapterId));

		return $req;

	}


	 public function getComments($chapterId)
	{

		

		$comments = $this->_db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE chapter_id = ? ORDER BY comment_date');
		$comments->execute(array($chapterId));

		return $comments;



	}

	public function getApprovedComments($chapterId)
	{

		

		$approvedComments = $this->_db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM approved WHERE chapter_id = ? ORDER BY comment_date');
		$approvedComments->execute(array($chapterId));

		return $approvedComments;



	}


	public function postComment($chapterId, $author, $comment)
	{
	    
	    $comments = $this->_db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date, report_nb) VALUES(?, ?, ?, NOW(), 0)');
	    $affectedLines = $comments->execute(array($chapterId, $author, $comment));

	    return $affectedLines;
	}

	public function testComment($id)
	{

		$testComment = $this->_db->prepare('SELECT id, report_nb FROM comments WHERE id = ?');
		$testComment->execute(array($id));
		$test = $testComment->fetch();
		return $test;

	}

	public function deleteComment($id)
	{
		

		$deleteComment = $this->_db->prepare('DELETE FROM comments WHERE id = ?');
		$deleteComment->execute(array($id));
	}

	public function addReport($id)
	{
		
		$reportComments = $this->_db->prepare('UPDATE comments SET report_nb = report_nb + 1 WHERE id = ?');
		$reportComments->execute(array($id));

	}

}