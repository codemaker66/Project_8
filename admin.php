<?php  
require_once(__DIR__ . "/controller/backend/UserController.php");
require_once(__DIR__ . "/controller/backend/CrudController.php");

$user = new Controller();
$controller = new CrudController();

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
      else
      {
        $user->checkLogin();
      }
      break;
    case 'comments':
      $controller->getAllComments();
      break;
    case 'add':
      if(isset($_POST['submit']))
      {
        $_POST = array_map( 'stripslashes', $_POST );

        //collect form data
        extract($_POST);

        //very basic validation
        if($postTitle ==''){
          $error[] = 'Please enter the title';
        }

        if($postCont ==''){
          $error[] = 'Please enter the content';
        }

        if(!isset($error))
        { 

          

          $controller->CreateArticle($_POST['postTitle'], $_POST['postCont']);

        }
        else
        {

          require('view/backend/add.php');
        }

      }
      else
      {
        require('view/backend/add.php');
      }
      
    break;
    case 'update':

      if (isset($_GET['id']) && $_GET['id'] > 0) {
            
        if(isset($_POST['submit']))
          {

            $_POST = array_map( 'stripslashes', $_POST );

              //collect form data
              extract($_POST);

              //very basic validation
              /*
              if($id ==''){
                  $error[] = 'This post is missing a valid id!.';
              }
                */
              if($title ==''){
                $error[] = 'Please enter the title';
              }

              if($content ==''){
                $error[] = 'Please enter the content';
              }


              if(!isset($error))
              { 

                  

                  $controller->updateChapter($_POST['title'], $_POST['content'],$_POST['id']);

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
          else
          {
            require('view/frontend/error.php');
          } 
    break;
    case 'approve':
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        
        $controller->approveComment($_GET['id']);
      }
      else
          {
            require('view/frontend/error.php');
          } 
    break;
    case 'deleteC':
      if (isset($_GET['id']) && $_GET['id'] > 0 ) {
        
        $controller->deleteComment($_GET['id']);
      }
      else
          {
            require('view/frontend/error.php');
          } 
    break;
    case 'delpost':
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        
        $controller->deletePost($_GET['id']);
      }
      else
          {
            require('view/frontend/error.php');
          } 
      break;

    default:
        require('view/frontend/error.php');
    break;
}

}
else{
  require('view/frontend/error.php');
}



?>