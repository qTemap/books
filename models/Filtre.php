<?php 

	class Filtre
	{

		static public function GetPointForMaps()
		{
			$newsList = array();

			$result = DB :: $dbh->query('SELECT *
										 FROM maps
										');

			$i = 0;
			while($row = $result->fetch()) {
				$newsList[$i]['cord1'] = $row['cord1'];
				$i++;
			}
			return $newsList;
			// $result1 = array(
			// 	 	'da' => $pointList
			// 		);
			// 	$json = json_encode($result1);
			// 	return $json;	
			//return $pointList;
		}

	}



?>