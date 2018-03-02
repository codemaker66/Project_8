<?php

require_once(__DIR__ . "/../dbManager.php");

class USER extends Manager
{	

	private $_db;
	
	public function __construct()
	{
		
		$this->_db = $this->dbConnect();
    }
    
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->_db->prepare("SELECT user_id, user_name, user_email, user_pass FROM user WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}

	
}


?>