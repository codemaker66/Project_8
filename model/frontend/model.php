<?php

require_once(__DIR__ . "/../dbManager.php");

class Model extends Manager {


	 public function getChapters()
	{ 

		$db = $this->dbConnect();

		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapters ORDER BY creation_date');

		return $req;

	}


	 public function getChapter($chapterId)
	{

		$db = $this->dbConnect();

		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapters WHERE id = ?');
		$req->execute(array($chapterId));
		$chapter = $req->fetch();

		return $chapter;


	}


	public function getAllComments()
	{

		$db = $this->dbConnect();

		$allComments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY comment_date');
		
		return $allComments;

	}


	 public function getComments($chapterId)
	{

		$db = $this->dbConnect();

		$comments = $db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE chapter_id = ? ORDER BY comment_date');
		$comments->execute(array($chapterId));

		return $comments;



	}


	public function postComment($chapterId, $author, $comment)
	{
	    $db = $this->dbConnect();
	    $comments = $db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($chapterId, $author, $comment));

	    return $affectedLines;
	}

}