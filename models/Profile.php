<?php 

	class Profile
	{

		//static public 

		static public function GetInfo($name,$sename) 
		{
			$result = DB :: $dbh->query('SELECT * FROM users WHERE name = ? AND sename = ? ', array($name,$sename));

			$user = $result->fetch();

			return $user;
		}



	}




?>