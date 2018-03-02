<?php
//call the backend CrudModel.php file
require_once(__DIR__ . "/../../model/backend/CrudModel.php");

//create a class named "CrudController"
class CrudController
{

    private $_crud;
      

    public function __construct()
    {
      //create an object from the class "Crud" and assign it to the property of this class
      $obj = new Crud();
      $this->_crud = $obj;

    }
  	//get all the rows and comments from the model
  	public function getAllComments()
  	{
        //we will show 5 comments per page
        $commentsPerPage=5;
     
        $total = $this->_crud->getallcomments();

        //we will now count the number of pages
        $numberOfPages=ceil($total/$commentsPerPage);

        //if the variable $_GET['page'] existe...
        if(isset($_GET['page']))
        {
            $currentPage=intval($_GET['page']);
               
            if($currentPage == 0) 
            {
              header("Location: error.php");
              exit();
            }
            //if the value of $currentPage (the number of the page) is bigger than $numberOfPages...
            elseif ($currentPage>$numberOfPages) {
                     
              $currentPage=$numberOfPages;
            }
        }
        else
        {
          //the current page is the n°1
          $currentPage=1;    
        }
        //we calculate the first entry to read
        $firstEntry=($currentPage-1)*$commentsPerPage;

    		$result = $this->_crud->readComments($firstEntry, $commentsPerPage);
    		require('view/backend/commentsManagement.php');
  	}
    //send the posted info to the model so the article is added
    public function CreateArticle ($postTitle, $postCont)
    {
        $this->_crud->create($postTitle, $postCont);
    }
    //call the model to delete an article and it's comments (approved or not)
    public function deletePost($delpost)
    {

        $this->_crud->delete($delpost);

        $this->_crud->deleteAllComments($delpost);

        $this->_crud->deleteApprovedComments($delpost);

        header('Location: admin.php?action=admin&status=supprimé');
        exit();

    }
    //get an article by it's id and test if it exists..if not we show an error
    public function selectChapter($id)
    {

        $stmt = $this->_crud->readChapter($id);

        if ($stmt->rowCount() != 0)
        {
          $data = $stmt->fetch(PDO::FETCH_ASSOC);
          return $data;
        }
        else
        {
          header("Location: error.php");
          exit();
        }

    }
    //send the new updated article to the model
    public function updateChapter($postTitle, $postCont, $id)
    {
        $this->_crud->update($postTitle, $postCont, $id);
    }
    //get a comment by it's id from the model and add it's content to a new table named approved and at the same time we delete it from the comment table
    public function approveComment($id)
    {

        $req = $this->_crud->getCommentId($id);

        $data = $req->fetch(PDO::FETCH_ASSOC);

        $this->_crud->approve($data['chapter_id'], $data['author'], $data['comment'], $data['comment_date']);

        $this->_crud->deleteComment($id);
        header('Location: admin.php?action=comments&status=approuvé');
        exit();
    }
    //call the model to delete a comment by it's id
    public function deleteComment($id)
    {
       $this->_crud->deleteComment($id);

       header('Location: admin.php?action=comments&status=supprimé');
       exit();
    }

}