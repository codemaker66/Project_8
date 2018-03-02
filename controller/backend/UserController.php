<?php
//create a session and call both backend models files: UserModel.php and CrudModel.php
session_start();
require_once(__DIR__ . "/../../model/backend/UserModel.php");
require_once(__DIR__ . "/../../model/backend/CrudModel.php");

//create a class named "UserController"
class UserController
{

    private $_login;
    private $_model;

    public function __construct()
    {
      //create an object from the class "User" and assign it to the property of this class
      $obj = new USER();
      $this->_login = $obj;

      //create an object from the class "Crud" and assign it to the property of this class
      $obj2 = new Crud();
      $this->_model = $obj2;

    }
    //test if a session exists then we show the admin page if not we show the login page
  	public function checkLogin()
  	{
      
  		if($this->_login->is_loggedin()!="")
  		{
  			
  		    //we will show 5 articles per page
          $chaptersPerPage=5;
       
          $total = $this->_model->getallchapters();

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

          $req = $this->_model->readChapters($firstEntry, $chaptersPerPage);

  			  require('view/backend/articlesManagement.php');
  		}

  		elseif(!$this->_login->is_loggedin())
  		{
  			// session no set redirects to login page
  			require('view/frontend/login.php');
  		}

  	}
    //we test if the login and the password are corrects then we show the admin page if not we show the login page with an error
  	public function sendLogin($uname,$umail,$upass)
  	{
  		
  		if($this->_login->doLogin($uname,$umail,$upass))
  		{
  			
      		//we will show 5 articles per page
          $chaptersPerPage=5;
       
          $total = $this->_model->getallchapters();

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

          $req = $this->_model->readChapters($firstEntry, $chaptersPerPage);

          require('view/backend/articlesManagement.php');
  		}
  		else
  		{
  			$error = "Mauvais détails !";
  			require('view/frontend/login.php');
  		}	

  	}
    //we do a logout an redirect to the index.php page
  	public function logOut()
  	{
  			$this->_login->doLogout();
  			$this->_login->redirect('index.php');
  	}

}

