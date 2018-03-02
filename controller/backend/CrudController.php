<?php

require_once(__DIR__ . "/../../model/backend/CrudModel.php");


class CrudController extends Crud
{
	
	public function getAllComments()
	{
		$messagesParPage=5; //Nous allons afficher 5 messages par page.
 
            $all = new Crud();
            $total = $all->getallComments();

                    //Nous allons maintenant compter le nombre de pages.
            $nombreDePages=ceil($total/$messagesParPage);

             
            if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
            {
                 $pageActuelle=intval($_GET['page']);

                 if($pageActuelle == 0) 
                 {
                      
                      header("Location: error.php");
                      exit();
                 }
             
                 elseif($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                 {
                      $pageActuelle=$nombreDePages;
                 }
        }
        else // Sinon
        {
             $pageActuelle=1; // La page actuelle est la n°1    
        }

   
        $premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

		$req = new Crud();
		$result = $req->readComments($premiereEntree, $messagesParPage);
		require('view/backend/commentsManagement.php');
	}

    public function CreateArticle ($postTitle, $postCont)
    {
        $test = new Crud();

        $data = $test->create($postTitle, $postCont);

    }

    public function deletePost($delpost)
    {
        $test = new Crud();

        $data = $test->delete($delpost);



    }

    public function selectChapter($id)
    {
        $test = new Crud();

        $data = $test->readChapters($id);

        require('view/backend/update.php');

    }

    public function updateChapter($postTitle, $postCont, $id)
    {
        $test = new Crud();

        $data = $test->update($postTitle, $postCont, $id);
    }



}