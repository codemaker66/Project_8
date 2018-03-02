<?php
session_start();
require_once(__DIR__ . "/../../model/backend/model.php");
require_once(__DIR__ . "/../../model/frontend/model.php");

class Controller extends USER
{
	public function checkLogin()
	{
		$login = new USER();

		if($login->is_loggedin()!="")
		{
			
			$messagesParPage=5; //Nous allons afficher 5 messages par page.
 
        $all = new Model();
        $total = $all->getAll();

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



        $model = new Model();
        $req = $model->getChapters($premiereEntree, $messagesParPage);


            $model = new Model();
            $comments = $model->getAllComments();
			require('view/backend/view.php');
		}

		elseif(!$login->is_loggedin())
		{
			// session no set redirects to login page
			require('view/frontend/login.php');
		}

	}

	public function sendLogin($uname,$umail,$upass)
	{
		$login = new USER();

		if($login->doLogin($uname,$umail,$upass))
		{
			
			$messagesParPage=5; //Nous allons afficher 5 messages par page.
 
        $all = new Model();
        $total = $all->getAll();

                //Nous allons maintenant compter le nombre de pages.
        $nombreDePages=ceil($total/$messagesParPage);

         
        if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
        {
             $pageActuelle=intval($_GET['page']);
         
             if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
             {
                  $pageActuelle=$nombreDePages;
             }
        }
        else // Sinon
        {
             $pageActuelle=1; // La page actuelle est la n°1    
        }

   
        $premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire



        $model = new Model();
        $req = $model->getChapters($premiereEntree, $messagesParPage);

            $model = new Model();
            $comments = $model->getAllComments();
			require('view/backend/view.php');
		}
		else
		{
			$error = "Wrong Details !";
			require('view/frontend/login.php');
		}	

	}

	public function logOut()
	{
			$login = new USER();
			$login->doLogout();
			$login->redirect('index.php');
	}

}

?>