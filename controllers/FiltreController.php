<?php 

	include_once ROOT.'/models/Filtre.php';

	class FiltreController
	{

		public function actionGroup()
		{
			if(isset($_POST['map'])) {
				$newsList = Filtre::GetPointForMaps();
				return $newsList;			
			}

			if(isset($_POST['proj'])) {
				$projList = Filtre::GetNameProject($_POST['proj']);
				return $projList;			
			}
			
			require_once(ROOT.'/views/filtre/first.php');

		}

		public function actionType($local)
		{

			
			require_once(ROOT.'/views/filtre/second.php');



			return $local;

			return true;
		}

		public function actionType_pay($local,$type)
		{
			require_once(ROOT.'/views/filtre/third.php');

			return true;
		}

	}




?>