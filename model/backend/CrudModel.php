<?php


class Crud extends Manager
{
	
	public function readComments($premiereEntree, $messagesParPage)
	{

		$db = $this->dbConnect();

		$allComments = $db->query('SELECT chapter_id, author, report_nb, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY report_nb DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
		$allComments->execute(array($premiereEntree, $messagesParPage));
		return $allComments;

	}

	public function readChapters($id)
	{
		$db = $this->dbConnect();
			$stmt = $db->prepare('SELECT id, title, content FROM chapters WHERE id = :postID') ;
			$stmt->execute(array(':postID' => $id));
			$data = $stmt->fetch();
			return $data;


	}

	public function getallchapters()
	{
		$db = $this->dbConnect();

		//Une connexion SQL doit être ouverte avant cette ligne...
        $retour_total= $db->query('SELECT COUNT(*) AS total FROM chapters'); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total= $retour_total->fetch(); //On range retour sous la forme d'un tableau.
        $total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
        return $total;


	}

	public function getallcomments()
	{
		$db = $this->dbConnect();

		//Une connexion SQL doit être ouverte avant cette ligne...
        $retour_total= $db->query('SELECT COUNT(*) AS total FROM comments'); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total= $retour_total->fetch(); //On range retour sous la forme d'un tableau.
        $total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
        return $total;


	}

	public function create($postTitle, $postCont)
	{
		$db = $this->dbConnect();

		$stmt = $db->prepare('INSERT INTO chapters (title, content, creation_date) VALUES (:postTitle, :postCont, NOW())') ;
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
		$db = $this->dbConnect();
		$stmt = $db->prepare('UPDATE chapters SET title = :postTitle, content = :postCont, creation_date = NOW() WHERE id = :postID') ;
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
			$db = $this->dbConnect();

	      $stmt = $db->prepare('DELETE chapters , comments  FROM chapters  INNER JOIN comments  
					WHERE chapters.id = comments.chapter_id and chapters.id = :postID');
	      
          $stmt->execute(array(':postID' => $delpost));

          header('Location: admin.php?action=admin&status=deleted');
          exit;

    }

}