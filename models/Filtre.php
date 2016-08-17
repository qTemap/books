<?php 

	class Filtre
	{

		static public function GetPointForMaps()
		{
			$newsList = array();

			$result = DB :: $dbh->query('SELECT * FROM maps,project WHERE maps.id_project = project.id');

			$i = 0;

			while($row = $result->fetch()) {
				$data['point'.(++$i)] = array($row['cord1'],$row['cord2'],$row['address'],$row['id_project'],$row['name_project']);				
			}

			$json = json_encode($data,JSON_UNESCAPED_UNICODE);
			echo $json;	
		}

	}



?>