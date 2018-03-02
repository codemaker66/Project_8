<?php


class Crud extends Manager
{
	private $_db;
	
	public function __construct()
	{
		
		$this->_db = $this->dbConnect();
    }
	
	public function readComments($firstEntry, $chaptersPerPage)
	{

		$allComments = $this->_db->query('SELECT id, chapter_id, author, report_nb, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY report_nb DESC LIMIT '.$firstEntry.', '.$chaptersPerPage.'');
		$allComments->execute(array($firstEntry, $chaptersPerPage));
		return $allComments;

	}

	public function readChapters($firstEntry, $chaptersPerPage)
	{

		$allChapters = $this->_db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(edit_date, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM chapters ORDER BY creation_date_fr LIMIT '.$firstEntry.', '.$chaptersPerPage.'');
		$allChapters->execute(array($firstEntry, $chaptersPerPage));
		return $allChapters;

	}

	public function readChapter($id)
	{
			$stmt = $this->_db->prepare('SELECT id, title, content FROM chapters WHERE id = :postID') ;
			$stmt->execute(array(':postID' => $id));
			return $stmt;
			/*
			$data = $stmt->fetch();
			return $data;*/


	}

	public function getallchapters()
	{

		//Une connexion SQL doit être ouverte avant cette ligne...
        $retour_total= $this->_db->query('SELECT COUNT(*) AS total FROM chapters'); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total= $retour_total->fetch(); //On range retour sous la forme d'un tableau.
        $total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
        return $total;


	}

	public function getallcomments()
	{

		//Une connexion SQL doit être ouverte avant cette ligne...
        $retour_total= $this->_db->query('SELECT COUNT(*) AS total FROM comments'); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total= $retour_total->fetch(); //On range retour sous la forme d'un tableau.
        $total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
        return $total;


	}

	public function create($postTitle, $postCont)
	{

		$stmt = $this->_db->prepare('INSERT INTO chapters (title, content, creation_date) VALUES (:postTitle, :postCont, NOW())') ;
        $stmt->execute(array(
          ':postTitle' => $postTitle,
          ':postCont' => $postCont
           ));

        //redirect to index page
        header('Location: admin.php?action=admin&status=created');
        exit;
	}

	public function update($postTitle, $postCont, $id)
	{
		$stmt = $this->_db->prepare('UPDATE chapters SET title = :postTitle, content = :postCont, edit_date = NOW() WHERE id = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postCont' => $postCont,
					':postID' => $id
				));

				//redirect to index page
				header('Location: admin.php?action=admin&status=updated');
				exit;


	}

	public function delete($delpost)
	{ 

	      $stmt = $this->_db->prepare('DELETE FROM chapters where id = :postID');
	      
          $stmt->execute(array(':postID' => $delpost));
    }

    public function deleteAllComments($delpost)
    {

	      $stmt = $this->_db->prepare('DELETE FROM comments where chapter_id = :postID');
	      
          $stmt->execute(array(':postID' => $delpost));

    }

    public function deleteApprovedComments($delpost)
    {

	      $stmt = $this->_db->prepare('DELETE FROM approved where chapter_id = :postID');
	      
          $stmt->execute(array(':postID' => $delpost));

    }

    public function getCommentId($id)
    {

		$comment = $this->_db->prepare('SELECT chapter_id, author, comment, comment_date FROM comments WHERE id = ?');
		$comment->execute(array($id));
		return $comment;

    }

    public function approve($chapter_id, $author, $comment, $comment_date)
	{

		$stmt = $this->_db->prepare('INSERT INTO approved (chapter_id, author, comment, comment_date) VALUES (?, ?, ?, ?)') ;
        $stmt->execute(array($chapter_id, $author, $comment, $comment_date));

        
	}


	public function deleteComment($id)
	{

	      $stmt = $this->_db->prepare('DELETE FROM comments WHERE id = :postID');
	      
          $stmt->execute(array(':postID' => $id));

	}

}