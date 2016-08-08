<?php 

	class ProjectController
	{

		public function actionIndex()
		{
			require_once(ROOT.'/views/project/index.php');

			return true;
		}

	}




?>