<?php require_once(__DIR__ . "/controller/backend/controller.php");

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
      else
      {
        require('view/frontend/error.php');
      }

}
else
{
  require('view/frontend/error.php');
}

?>