<?php

class Manager {
	
	protected function dbConnect()
	{

		try
		{
			$db = new PDO('mysql:host=localhost;dbname=project_8;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;
		}
		catch(Exception $e)
		{
		    die('Erreur : '.$e->getMessage());
		}


	}
   
}