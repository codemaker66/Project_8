<?php
session_start();
require_once("model/backend/model.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('view/backend/admin.php');
}

if(isset($_POST['btn-login']))
{
	$uname = $_POST['txt_uname_email'];
	$umail = $_POST['txt_uname_email'];
	$upass = $_POST['txt_password'];
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('view/backend/admin.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}


?>