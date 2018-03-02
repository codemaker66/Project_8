<?php 
//call both backend controllers files: UserController.php and CrudController.php
require_once(__DIR__ . "/controller/backend/UserController.php");
require_once(__DIR__ . "/controller/backend/CrudController.php");

//create an object from the class "UserController"
$user = new UserController();

//create an object from the class "CrudController"
$controller = new CrudController();

//test if $_GET['action'] exists..then we use a switch to test it's value
if (isset($_GET['action'])) {
  
    switch ($_GET['action']) {
    
        case 'logout':

            $user->logOut();

            break;

        case 'admin':

            if(isset($_POST['btn-login']))
            {
              $uname = $_POST['txt_uname_email'];
              $umail = $_POST['txt_uname_email'];
              $upass = $_POST['txt_password'];
                        
              $user->sendLogin($uname,$umail,$upass);
            }
            else{
              $user->checkLogin();
            }

            break;

        case 'comments':

            $controller->getAllComments();

            break;

        case 'add':
            if(isset($_POST['submit']))
            {

                //collect form data
                extract($_POST);

                //very basic validation
                if($postTitle ==''){
                  $error[] = 'Entrez le titre s\'il vous plaît';
                }

                if($postCont ==''){
                  $error[] = 'Entrez le contenu s\'il vous plaît';
                }


                if(!isset($error)){ 
                  $controller->CreateArticle($_POST['postTitle'], $_POST['postCont']);
                }
                else{
                  require('view/backend/add.php');
                }

            }
            else{
              require('view/backend/add.php');
            }
            
            break;

        case 'update':

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                  
              if(isset($_POST['submit']))
                {
                  
                    //collect form data
                    extract($_POST);

                    //very basic validation
                    if($title ==''){
                      $error[] = 'Entrez le titre s\'il vous plaît';
                    }

                    if($content ==''){
                      $error[] = 'Entrez le contenu s\'il vous plaît';
                    }


                    if(!isset($error)){ 
                        $controller->updateChapter($_POST['title'], $_POST['content'], $_POST['id']);
                    }
                    else
                    {        
                       $data = $controller->selectChapter($_GET['id']);
                       require("view/backend/update.php"); 
                    }

                }
                else
                {
                  $data = $controller->selectChapter($_GET['id']);
                  require("view/backend/update.php");
                }

            }
            else{
              require('view/frontend/error.php');
            } 

            break;

        case 'approve':

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller->approveComment($_GET['id']);
            }
            else{
                require('view/frontend/error.php');
            }

            break;

        case 'deleteC':

            if (isset($_GET['id']) && $_GET['id'] > 0 ) {
                $controller->deleteComment($_GET['id']);
            }
            else{
                require('view/frontend/error.php');
            } 
            break;

        case 'delpost':

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller->deletePost($_GET['id']);
            }
            else{
                require('view/frontend/error.php');
            } 
            break;

        default:
            //if none of the cases exists we show the error page
            require('view/frontend/error.php');

            break;
    }
}
else{
  //if $_GET['action'] dont exists we show the error page
  require('view/frontend/error.php');
}

