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
			$model = new Model();
            $req = $model->getChapters();
            $model = new Model();
            $comments = $model->getAllComments();
			require('view/backend/view.php');
		}

		elseif(!$login->is_loggedin())
		{
			// session no set redirects to login page
			require('view/backend/login.php');
		}

	}

	public function sendLogin($uname,$umail,$upass)
	{
		$login = new USER();

		if($login->doLogin($uname,$umail,$upass))
		{
			$model = new Model();
            $req = $model->getChapters();
            $model = new Model();
            $comments = $model->getAllComments();
			require('view/backend/view.php');
		}
		else
		{
			$error = "Wrong Details !";
			require('view/backend/login.php');
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