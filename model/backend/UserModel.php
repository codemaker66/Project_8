<?php
//call the dbManager.php file
require_once(__DIR__ . "/../dbManager.php");

//create a child class "USER" from the class "Manager"
class USER extends Manager
{	

	private $_db;
	
	public function __construct()
	{
		//call the dbConnect methode from the class "Manager" and assign the value returned to the property of this class
		$this->_db = $this->dbConnect();
    }
    //test if the user and it's pass exists then test the password typed if none of that find the user we show an error
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
	//test if a session exists
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	//redirect the user by the url passed to the methode
	public function redirect($url)
	{
		header("Location: $url");
	}
	//do a session destroy and logout the user
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}

	
}