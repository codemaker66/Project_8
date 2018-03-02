<?php

//create a child class "Crud" from the class "Manager"
class Crud extends Manager
{
	private $_db;
	
	public function __construct()
	{
		//call the dbConnect methode from the class "Manager" and assign the value returned to the property of this class
		$this->_db = $this->dbConnect();
    }
	//get all comments from the table comments and limit the result by 5
	public function readComments($firstEntry, $commentsPerPage)
	{

		$allComments = $this->_db->query('SELECT id, chapter_id, author, report_nb, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY report_nb DESC LIMIT '.$firstEntry.', '.$commentsPerPage.'');
		$allComments->execute(array($firstEntry, $commentsPerPage));
		return $allComments;

	}
	//get all articles from the table chapters and limit the result by 5
	public function readChapters($firstEntry, $chaptersPerPage)
	{

		$allChapters = $this->_db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(edit_date, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM chapters ORDER BY creation_date_fr DESC LIMIT '.$firstEntry.', '.$chaptersPerPage.'');
		$allChapters->execute(array($firstEntry, $chaptersPerPage));
		return $allChapters;

	}
	//get an article by it's id
	public function readChapter($id)
	{

		$stmt = $this->_db->prepare('SELECT id, title, content FROM chapters WHERE id = :postID') ;
		$stmt->execute(array(':postID' => $id));
		return $stmt;

	}
	//get all the rows from the table chapters
	public function getallchapters()
	{

        $total_return= $this->_db->query('SELECT COUNT(*) AS total FROM chapters');
        $total_data= $total_return->fetch(PDO::FETCH_ASSOC);
        $total=$total_data['total'];
        return $total;

	}
	//get all the rows from the table comments
	public function getallcomments()
	{

        $total_return= $this->_db->query('SELECT COUNT(*) AS total FROM comments'); 
        $total_data= $total_return->fetch(PDO::FETCH_ASSOC); 
        $total=$total_data['total'];
        return $total;

	}
	//add the article created to the table chapters
	public function create($postTitle, $postCont)
	{

		$stmt = $this->_db->prepare('INSERT INTO chapters (title, content, creation_date) VALUES (:postTitle, :postCont, NOW())') ;
        $stmt->execute(array(
          ':postTitle' => $postTitle,
          ':postCont' => $postCont
           ));

        //redirect to index page
        header('Location: admin.php?action=admin&status=créé');
        exit();
	}
	//add the new updated article to the database
	public function update($postTitle, $postCont, $id)
	{

		$stmt = $this->_db->prepare('UPDATE chapters SET title = :postTitle, content = :postCont, edit_date = NOW() WHERE id = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postCont' => $postCont,
					':postID' => $id
				));

		//redirect to index page
		header('Location: admin.php?action=admin&status=mis à jour');
		exit();
	}
	//delete an article from the table chapters
	public function delete($delpost)
	{ 

		$stmt = $this->_db->prepare('DELETE FROM chapters where id = :postID');
		$stmt->execute(array(':postID' => $delpost));

    }
    //delete all the comments that have the same id as the article id from the table comments
    public function deleteAllComments($delpost)
    {

	    $stmt = $this->_db->prepare('DELETE FROM comments where chapter_id = :postID');
        $stmt->execute(array(':postID' => $delpost));

    }
    //delete all the approved comments that have the same id as the article id from the table approved
    public function deleteApprovedComments($delpost)
    {

	    $stmt = $this->_db->prepare('DELETE FROM approved where chapter_id = :postID');
        $stmt->execute(array(':postID' => $delpost));

    }
    //get a comment by it's id from the table comments
    public function getCommentId($id)
    {

		$comment = $this->_db->prepare('SELECT chapter_id, author, comment, comment_date FROM comments WHERE id = ?');
		$comment->execute(array($id));
		return $comment;

    }
    //add a comments and all it's info to the table approved
    public function approve($chapter_id, $author, $comment, $comment_date)
	{

		$stmt = $this->_db->prepare('INSERT INTO approved (chapter_id, author, comment, comment_date) VALUES (?, ?, ?, ?)') ;
        $stmt->execute(array($chapter_id, $author, $comment, $comment_date));
 
	}

	//delete a comment by it's id from the table comments
	public function deleteComment($id)
	{

	    $stmt = $this->_db->prepare('DELETE FROM comments WHERE id = :postID');
        $stmt->execute(array(':postID' => $id));

	}

}