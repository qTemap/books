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
				// $newsList[$i]['cord1'] = $row['cord1'];
				// $newsList[$i]['cord2'] = $row['cord2'];
				// $newsList[$i]['address'] = $row['address'];
				// $i++;

				$data['point'.(++$i)] = array($row['cord1'],$row['cord2'],$row['address']);
				
			}
			//print_r($newsList);
			// $result1 = array(
			// 	 	'da' => $pointList
			// 		);
				$json = json_encode($data,JSON_UNESCAPED_UNICODE);
				echo $json;	
			//return $pointList;
		}

	}



?>