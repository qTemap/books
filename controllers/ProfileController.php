<?php 
	include_once ROOT.'/models/Profile.php';

	class ProfileController
	{

		public function actionIndex()
		{
			if(isset($_COOKIE['name'])) {
				$user = Profile::GetInfo($_COOKIE['name'],$_COOKIE['sename']);

				require_once(ROOT.'/views/profile/index.php');

				return true;
			} else {
				header("Location: /all_project"); exit;
			}
		}



	}





?>