<?php

require_once(__DIR__ . "/../../model/backend/CrudModel.php");


class CrudController
{

  private $_crud;
    

    public function __construct()
    {
      
      $obj = new Crud();
      $this->_crud = $obj;

    }
	
	public function getAllComments()
	{
		$commentsPerPage=5; //Nous allons afficher 5 messages par page.
     
        $total = $this->_crud->getallcomments();

        //Nous allons maintenant compter le nombre de pages.
        $numberOfPages=ceil($total/$commentsPerPage);

             
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

        $firstEntry=($currentPage-1)*$commentsPerPage; // On calcul la première entrée à lire

    		$result = $this->_crud->readComments($firstEntry, $commentsPerPage);
    		require('view/backend/commentsManagement.php');
	}

    public function CreateArticle ($postTitle, $postCont)
    {
        

        $this->_crud->create($postTitle, $postCont);

    }

    public function deletePost($delpost)
    {

        $this->_crud->delete($delpost);

        $this->_crud->deleteAllComments($delpost);

        $this->_crud->deleteApprovedComments($delpost);

        header('Location: admin.php?action=admin&status=deleted');
          exit;

    }

    public function selectChapter($id)
    {

        $stmt = $this->_crud->readChapter($id);

        /*require('view/backend/update.php');*/
        if ($stmt->rowCount() != 0)
        {
          $data = $stmt->fetch();
          return $data;
        }
        else
        {
          header("Location: error.php");
                  exit();
        }

        

    }

    public function updateChapter($postTitle, $postCont, $id)
    {
        $this->_crud->update($postTitle, $postCont, $id);
    }

    public function approveComment($id)
    {

      $req = $this->_crud->getCommentId($id);

      $data = $req->fetch();

      $this->_crud->approve($data['chapter_id'], $data['author'], $data['comment'], $data['comment_date']);

      $this->_crud->deleteComment($id);
      header('Location: admin.php?action=comments&status=approved');
          exit;
    }

    public function deleteComment($id)
    {
       $this->_crud->deleteComment($id);

       header('Location: admin.php?action=comments&status=deleted');
          exit;

    }



}