<?php 

	class Project
	{


		static public function CreateNewProject($coord_1, $coord_2, $place, $type, $type_pay, $global, $name_project, $discription, $price, $days)
		{
			$name = DB :: $dbh -> queryFetch("SELECT * FROM project  ORDER BY id DESC LIMIT 1");

			if($name_project != $name['name_project']) {

				DB :: $dbh -> query("INSERT INTO project (name_project, price, days, discription, global, type, type_pay) 
									 VALUES ( ?, ?, ?, ?, ?, ?, ?); 
									 LIMIT 1", 
									 array($name_project, $price, $days, $discription, $global, $type, $type_pay)); 

				$result = DB :: $dbh -> queryFetch("SELECT * FROM project 
									 ORDER BY id DESC LIMIT 1"); 

				if(isset($coord_1)) {
					DB :: $dbh -> query("INSERT INTO maps (cord1, cord2, address, id_project) 
										 VALUES ( ?, ?, ?, ?); 
										 LIMIT 1", 
										 array($coord_1, $coord_2, $place, 
										 	$result['id'])); 
				}
			}
		}

		static public function ProjectById($id) {
			$id = intval($id);

			if ($id) {

				$result = DB :: $dbh->query('SELECT * FROM project WHERE id='. $id);

				$project = $result->fetch();

				return $project;
			}
		}

	}



?>