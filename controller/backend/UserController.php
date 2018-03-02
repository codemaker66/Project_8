<?php
session_start();
require_once(__DIR__ . "/../../model/backend/UserModel.php");
require_once(__DIR__ . "/../../model/backend/CrudModel.php");

class Controller
{

    private $_login;
    private $_model;

    public function __construct()
    {
      
      $obj = new USER();
      $this->_login = $obj;

      $obj2 = new Crud();
      $this->_model = $obj2;

    }

	public function checkLogin()
	{
		

		if($this->_login->is_loggedin()!="")
		{
			
			$chaptersPerPage=5; //Nous allons afficher 5 messages par page.
     
            $total = $this->_model->getallchapters();

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

            $req = $this->_model->readChapters($firstEntry, $chaptersPerPage);

			require('view/backend/view.php');
		}

		elseif(!$this->_login->is_loggedin())
		{
			// session no set redirects to login page
			require('view/frontend/login.php');
		}

	}

	public function sendLogin($uname,$umail,$upass)
	{
		

		if($this->_login->doLogin($uname,$umail,$upass))
		{
			
    			$chaptersPerPage=5; //Nous allons afficher 5 messages par page.
     
            $total = $this->_model->getallchapters();

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

            $req = $this->_model->readChapters($firstEntry, $chaptersPerPage);

    		require('view/backend/view.php');
		}
		else
		{
			$error = "Mauvais détails !";
			require('view/frontend/login.php');
		}	

	}

	public function logOut()
	{
			
			$this->_login->doLogout();
			$this->_login->redirect('index.php');
	}

}

?>