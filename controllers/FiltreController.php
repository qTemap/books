<?php 

	include_once ROOT.'/models/Filtre.php';

	class FiltreController
	{

		public function actionGroup()
		{
			//if(isset($_POST['map'])) {
				$newsList = array();
				$newsList = Filtre::GetPointForMaps();
								
			//}
			
			require_once(ROOT.'/views/filtre/first.php');

			return true;
		}

		public function actionType($local)
		{


			require_once(ROOT.'/views/filtre/second.php');

			return $local;

			return true;
		}

		public function actionType_pay($local,$type_pay)
		{
			require_once(ROOT.'/views/filtre/third.php');

			return true;
		}

	}




?>