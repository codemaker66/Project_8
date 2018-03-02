<?php
//call the frontend model.php file
require_once(__DIR__ . "/../../model/frontend/model.php");

//create a class named "Controller"
class Controller {

    private $_model;

    public function __construct()
    {
      //create an object from the class Model and assign it to the property of this class
      $obj = new Model();
      $this->_model = $obj;

    }
    //call the model to get all rows and chapters from database
    public function listChapters()
    {
        //we will show 5 articles per page
        $chaptersPerPage=5;
     
        $total = $this->_model->getAllRows();

        //we will now count the number of pages
        $numberOfPages=ceil($total/$chaptersPerPage);

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
        $firstEntry=($currentPage-1)*$chaptersPerPage;

        $req = $this->_model->getChapters($firstEntry, $chaptersPerPage);

        require('view/frontend/indexView.php');

    }
    //call the model to get a chapter and it's comments(approved or not) if they exists in database
    public function listPosts()
    {
          
        $req = $this->_model->getChapter($_GET['id']);
        $comments = $this->_model->getComments($_GET['id']);
        $approvedComments = $this->_model->getApprovedComments($_GET['id']);

        if ($req->rowCount() != 0)
        {
          $chapter = $req->fetch(PDO::FETCH_ASSOC);
          require('view/frontend/commentsView.php');
        }
        else
        {
          require('view/frontend/error.php');
        }

      }
    //call the model to add a comment in database
    public function addComment($chapterId, $author, $comment)
    {
          
        $affectedLines = $this->_model->postComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=listPosts&id=' . $chapterId);
            exit();
        }
      }
    //call the model to test if a comment have a report number of 5..if so the comment is deleted,if not we add 1 to report number
    public function report($id, $chapterId)
    {
          
        $report = $this->_model->testComment($id);

        if ($report['report_nb']  == 4) {
            
            $this->_model->deleteComment($report['id']);
            header('Location: index.php?action=listPosts&id=' . $chapterId);
            exit();
        }

        else{
          
          $this->_model->addReport($report['id']);
          header('Location: index.php?action=listPosts&id=' . $chapterId);
          exit();
        }
    }
    
}
