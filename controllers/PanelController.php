<?php 
	
	include_once ROOT.'/models/Panel.php';

	class PanelController
	{

		public function actionIndex()
		{
			if(isset($_COOKIE['name'])) {
				Panel::GetAdminName($_COOKIE['name']);				
			} else {
				Panel::Head();
			}

			return true;
		}

	}








?>