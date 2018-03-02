<?php
//call the dbManager.php file
require_once(__DIR__ . "/../dbManager.php");

//create a child class named "Model" from the class "Manager"
class Model extends Manager {


	private $_db;

    public function __construct()
    {
      //call the dbConnect methode from the class Manager and assign the value returned to the property of this class
      $this->_db = $this->dbConnect();

    }
    //return all rows from the table chapters
	public function getAllRows()
	{
		
        $total_return= $this->_db->query('SELECT COUNT(*) AS total FROM chapters');
        $total_data= $total_return->fetch(PDO::FETCH_ASSOC);
        $total=$total_data['total'];

        return $total;

	}
	//get all articles from the table chapters and limit the result by 5
	 public function getChapters($firstEntry, $chaptersPerPage)
	{ 
		$req = $this->_db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(edit_date, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM chapters ORDER BY creation_date_fr DESC  LIMIT '.$firstEntry.', '.$chaptersPerPage.'');
		$req->execute(array($firstEntry, $chaptersPerPage));

		return $req;

	}
	//get an article from the table chapters with it's id
	 public function getChapter($chapterId)
	{

		$req = $this->_db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(edit_date, \'%d/%m/%Y à %Hh%imin%ss\') AS edit_date_fr FROM chapters WHERE id = ?');
		$req->execute(array($chapterId));

		return $req;

	}
	//get the new posted comments from the table comments that have the same id as the article id
	 public function getComments($chapterId)
	{

		$comments = $this->_db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE chapter_id = ? ORDER BY comment_date');
		$comments->execute(array($chapterId));

		return $comments;

	}
	//get approved comments from the table approved that have the same id as the article id
	public function getApprovedComments($chapterId)
	{

		$approvedComments = $this->_db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM approved WHERE chapter_id = ? ORDER BY comment_date');
		$approvedComments->execute(array($chapterId));

		return $approvedComments;

	}
	//add a comment in the table comments
	public function postComment($chapterId, $author, $comment)
	{
	    
	    $comments = $this->_db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date, report_nb) VALUES(?, ?, ?, NOW(), 0)');
	    $affectedLines = $comments->execute(array($chapterId, $author, $comment));

	    return $affectedLines;
	}
	//get the id and the report number of a comment
	public function testComment($id)
	{

		$testComment = $this->_db->prepare('SELECT id, report_nb FROM comments WHERE id = ?');
		$testComment->execute(array($id));
		$test = $testComment->fetch(PDO::FETCH_ASSOC);

		return $test;

	}
	//delete a comment from the table comments
	public function deleteComment($id)
	{
		
		$deleteComment = $this->_db->prepare('DELETE FROM comments WHERE id = ?');
		$deleteComment->execute(array($id));
		
	}
	//add 1 to the report number of a comment
	public function addReport($id)
	{
		
		$reportComments = $this->_db->prepare('UPDATE comments SET report_nb = report_nb + 1 WHERE id = ?');
		$reportComments->execute(array($id));

	}

}