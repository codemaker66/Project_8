<?php require_once(__DIR__ . "/controller/backend/controller.php");
require_once(__DIR__ . "/controller/backend/CrudController.php");

if(isset($_GET['delpost']))
{ 
    $test = new CrudController();
    $data = $test->deletePost($_GET['delpost']);
}

if (isset($_GET['action'])) {
  
switch ($_GET['action']) {
  
  case 'logout':
      $user = new Controller();
      $user->logOut();
    break;
  case 'admin':
  $user = new Controller();
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
        $req = new CrudController();
        $req->getAllComments();
    break;

  case 'add':
        if(isset($_POST['submit']))
          {

              $_POST = array_map( 'stripslashes', $_POST );

              //collect form data
              extract($_POST);

              //very basic validation
              if($postTitle ==''){
                $error[] = 'Please enter the title.';
              }

              if($postCont ==''){
                $error[] = 'Please enter the content.';
              }

              if(!isset($error))
              { 

                  $test = new CrudController();

                  $create = $test->CreateArticle($_POST['postTitle'], $_POST['postCont']);

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
        if(isset($_POST['submit']))
          {

            $_POST = array_map( 'stripslashes', $_POST );

              //collect form data
              extract($_POST);

              //very basic validation
              if($id ==''){
                  $error[] = 'This post is missing a valid id!.';
              }

              if($title ==''){
                $error[] = 'Please enter the title.';
              }

              if($content ==''){
                $error[] = 'Please enter the content.';
              }


              if(!isset($error))
              { 

                  $test = new CrudController();

                  $create = $test->updateChapter($_POST['title'], $_POST['content'],$_POST['id']);

              }
              else
              {
                 $test = new CrudController();
                 $dat = $test->selectChapter($_GET['id']);
              }
            }
        
        elseif (isset($_GET['id']) && $_GET['id'] > 0) {
            $test = new CrudController();
            $dat = $test->selectChapter($_GET['id']);
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





/*
if (isset($_GET['action'])) {
      if ($_GET['action'] == 'admin') {

            $user = new Controller();

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
      }
      elseif($_GET['action'] == 'logout')
      {
        $user = new Controller();
        $user->logOut();

      }
      elseif($_GET['action'] == 'comments')
      {
        $req = new CrudController();
        $req->getAllComments();
      }
      elseif ($_GET['action'] == 'add') {
          if(isset($_POST['submit']))
          {

            $_POST = array_map( 'stripslashes', $_POST );

              //collect form data
              extract($_POST);

              //very basic validation
              if($postTitle ==''){
                $error[] = 'Please enter the title.';
              }

              if($postCont ==''){
                $error[] = 'Please enter the content.';
              }


              if(!isset($error))
              { 

                  $test = new CrudController();

                  $create = $test->CreateArticle($_POST['postTitle'], $_POST['postCont']);

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
      }
      elseif ($_GET['action'] == 'update') {

        if(isset($_POST['submit']))
          {

            $_POST = array_map( 'stripslashes', $_POST );

              //collect form data
              extract($_POST);

              //very basic validation
              if($id ==''){
                  $error[] = 'This post is missing a valid id!.';
              }

              if($title ==''){
                $error[] = 'Please enter the title.';
              }

              if($content ==''){
                $error[] = 'Please enter the content.';
              }


              if(!isset($error))
              { 

                  $test = new CrudController();

                  $create = $test->updateChapter($_POST['title'], $_POST['content'],$_POST['id']);

              }
              else
              {
                 $test = new CrudController();
                 $dat = $test->selectChapter($_GET['id']);
              }
            }
        
        elseif (isset($_GET['id']) && $_GET['id'] > 0) {
            $test = new CrudController();
            $dat = $test->selectChapter($_GET['id']);
        }
        else
        {
          require('view/frontend/error.php');
        }

        
              
        }

      
      else
      {
        require('view/frontend/error.php');
      }

}
else
{
  require('view/frontend/error.php');
}

if(isset($_GET['delpost']))
      { 

          $test = new CrudController();

          $data = $test->deletePost($_GET['delpost']);
      
      }
*/
?>