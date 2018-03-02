<?php

require(__DIR__ . "/../../model/frontend/model.php");


class Controller {

    private $_model;

    public function __construct()
    {
      
      $obj = new Model();
      $this->_model = $obj;

    }
    
    public function listChapters()
    {

        $chaptersPerPage=5; //Nous allons afficher 5 messages par page.
     
        $total = $this->_model->getAllRows();

        //Nous allons maintenant compter le nombre de pages.
        $numberOfPages=ceil($total/$chaptersPerPage);

             
        if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
        {
            $currentPage=intval($_GET['page']);
               
            if($currentPage == 0) 
            {
              header("Location: error.php");
              exit();
            }
            elseif ($currentPage>$numberOfPages) { // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                     
              $currentPage=$numberOfPages;
            }
        }
        else // Sinon
        {
          $currentPage=1; // La page actuelle est la n°1    
        }

        $firstEntry=($currentPage-1)*$chaptersPerPage; // On calcul la première entrée à lire

        $req = $this->_model->getChapters($firstEntry, $chaptersPerPage);

        require('view/frontend/indexView.php');

    }

    public function listPosts()
    {
          
        $req = $this->_model->getChapter($_GET['id']);
        $comments = $this->_model->getComments($_GET['id']);
        $approvedComments = $this->_model->getApprovedComments($_GET['id']);

        if ($req->rowCount() != 0)
        {
          $chapter = $req->fetch();
          require('view/frontend/commentsView.php');
        }
        else
        {
          require('view/frontend/error.php');
        }

      }

    public function addComment($chapterId, $author, $comment)
    {
          
        $affectedLines = $this->_model->postComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=listPosts&id=' . $chapterId);
        }
      }

    public function report($id, $chapterId)
    {
          
        $report = $this->_model->testComment($id);

        if ($report['report_nb']  == 4) {
            
            $this->_model->deleteComment($report['id']);
            header('Location: index.php?action=listPosts&id=' . $chapterId);
        }

        else{
          
          $this->_model->addReport($report['id']);
          header('Location: index.php?action=listPosts&id=' . $chapterId);
        }
    }
    
}
