<?php 

	class Project
	{

		static public function CreateNewProject($coord_1, $coord_2, $place)
		{
			DB :: $dbh -> query("INSERT INTO maps (cord1, cord2, address) 
								 VALUES ( ?, ?, ?); 
								 LIMIT 1", 
								 array($coord_1, $coord_2, $place)); 
		}

	}



?>