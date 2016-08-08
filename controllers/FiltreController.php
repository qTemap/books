<?php 

	class FiltreController
	{

		public function actionGroup()
		{
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