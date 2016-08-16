<?php 

	class Project
	{


		static public function CreateNewProject($coord_1, $coord_2, $place, $type, $type_pay, $global, $name_project, $discription, $price, $days, $cookie_user_name,$cookie_user_sename)
		{
			$id = DB :: $dbh->query('SELECT * FROM users WHERE name = ? AND sename = ? ', array($cookie_user_name,$cookie_user_sename));

			$id_user = $id->fetch();

			$name = DB :: $dbh -> queryFetch("SELECT * FROM project  ORDER BY id DESC LIMIT 1");

			if($name_project != $name['name_project']) {
			
				DB :: $dbh -> query("INSERT INTO project (name_project, user, price, days, discription, global, type, type_pay) 
									 VALUES ( ?, ?, ?, ?, ?, ?, ?, ?); 
									 LIMIT 1", 
									 array($name_project, $id_user['id'], $price, $days, $discription, $global, $type, $type_pay)); 

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

				//$result = DB :: $dbh->query('SELECT * FROM project, maps WHERE maps.id_project = project.id AND project.id='. $id);

				$result = DB :: $dbh->query('SELECT * FROM project WHERE id='. $id);

				$project = $result->fetch();

				return $project;
			}
		}

		static public function GetAddress($id)
		{
			$counrty = "Украина";

			$result = DB :: $dbh->query('SELECT * FROM maps WHERE id_project='. $id);

			$address = $result->fetch();
			if(empty($address)) {
				return $counrty;
			} else {
				return $address['address'];
			}

		}

		static public function ViewProjectGroupe($type, $type_pay)
		{
			$result = DB :: $dbh->query('SELECT * FROM project WHERE type = ? AND type_pay = ? AND global = 1', array($type, $type_pay));
		
			$i = 0;
			while($row = $result->fetch()) {
				$projectList[$i]['id'] = $row['id'];
				$projectList[$i]['name_project'] = $row['name_project'];
				$projectList[$i]['user'] = $row['user'];
				$projectList[$i]['price'] = $row['price'];
				$projectList[$i]['collected'] = $row['collected'];
				$projectList[$i]['days'] = $row['days'];
				$projectList[$i]['img'] = $row['img'];
				$projectList[$i]['discription'] = $row['discription'];
				$projectList[$i]['type'] = $row['type'];
				$projectList[$i]['type_pay'] = $row['type_pay'];
				$i++;
			}
			return $projectList;
		}

		static public function GetListProject()
		{			
			$result = DB :: $dbh->query('SELECT * FROM project');
		
			$i = 0;
			while($row = $result->fetch()) {
				$projectList[$i]['id'] = $row['id'];
				$projectList[$i]['name_project'] = $row['name_project'];
				$projectList[$i]['user'] = $row['user'];
				$projectList[$i]['price'] = $row['price'];
				$projectList[$i]['collected'] = $row['collected'];
				$projectList[$i]['days'] = $row['days'];
				$projectList[$i]['img'] = $row['img'];
				$projectList[$i]['discription'] = $row['discription'];
				$projectList[$i]['type'] = $row['type'];
				$projectList[$i]['type_pay'] = $row['type_pay'];
				$i++;
			}
			return $projectList;
		}

		static public function GetInfoForUser($name, $sename)
		{
			$result = DB :: $dbh->query('SELECT * FROM users WHERE name = ? AND sename = ? ', array($name,$sename));

			$user = $result->fetch();

			return $user;
		}

		static public function GetProjectByUserId($cookie_user_name,$cookie_user_sename)
		{
			$id = DB :: $dbh->query('SELECT * FROM users WHERE name = ? AND sename = ? ', array($cookie_user_name,$cookie_user_sename));

			$id_user = $id->fetch();

			$project = DB :: $dbh->query('SELECT * FROM project WHERE user = ? ', array($id_user['id']));

			$projectList = $project->fetch();

			return $projectList;
		}

		static public function get_duration ($date_from, $date_till) {
	        $date_from = explode('-', $date_from);
	        $date_till = explode('-', $date_till);
	 
	        $time_from = mktime(0, 0, 0, $date_from[1], $date_from[2], $date_from[0]);
	        $time_till = mktime(0, 0, 0, $date_till[1], $date_till[2], $date_till[0]);
	        
	        $diff = ($time_till - $time_from)/60/60/24;
	 
	        return $diff;
	    }

	}



?>