<?php 

	include_once ROOT.'/models/Project.php';
	include_once ROOT.'/models/face.php';

	class ProjectController
	{

		public function actionIndex()
		{
			$fb = new FBAuth(array(
				"client_id"		=> "530570083816060",
				"client_secret"	=> "905948040ad36c7a32b121acf6627e5a",
				"redirect_uri"	=> "https://booksinf.herokuapp.com/all_project/"
			));
			
			if(isset($_GET["code"])) {

				if($fb->auth($_GET["code"])) {

					$result = DB :: $dbh->query('SELECT * FROM users WHERE name = ? AND sename = ?', array($fb->user_info["first_name"], $fb->user_info["last_name"]));
					$user = $result->fetch();
					if(!empty($user['name'])) {
		
						setcookie("name",$fb->user_info["first_name"],time()+(1000*60*60*24*30*12));
						setcookie("sename",$fb->user_info["last_name"],time()+(1000*60*60*24*30*12));	

						header("Location: /all_project/"); exit;
					} else {
						DB :: $dbh -> query("INSERT INTO users (name, sename, foto) 
											 VALUES ( ?, ?, ?); 
											 LIMIT 1", 
											 array($fb->user_info["first_name"], $fb->user_info["last_name"], $fb->user_info["picture"]["data"]["url"]));
						setcookie("name",$fb->user_info["first_name"],time()+(1000*60*60*24*30*12));
						setcookie("sename",$fb->user_info["last_name"],time()+(1000*60*60*24*30*12));	

						header("Location: /all_project/"); exit;
					}
				}
			}

			$projectList = array();
			$projectList = Project::GetListProject();
			

			require_once(ROOT.'/views/project/index.php');

			return true;
		}


		public function actionCreate()
		{
			//$user = Project::GetInfoForUser($_COOKIE['name'], $_COOKIE['sename']);

			//if($user['card'] != '') {
				if(isset($_POST['name_project'])) {
					Project::CreateNewProject($_POST['coord_1'], $_POST['coord_2'], $_POST['place'], $_POST['type'], $_POST['type_pay'], $_POST['global'], $_POST['name_project'], $_POST['discription'], $_POST['price'], $_POST['days']);
				}

				require_once(ROOT.'/views/project/create.php');
			// } else { 
			// 	header("Location: profile"); exit;
			// }
			return true;
		}

		public function actionView($id) 
		{
			$projectItem = Project::ProjectById($id);

			$address = Project::GetAddress($id);

			$days = Project::get_duration(date('Y-m-d'),$projectItem['days']);

			require_once(ROOT.'/views/project/project_for_filtre.php');

			return true;
		}

		public function actionView_groupe($local, $type, $type_pay) 
		{
			if(!isset($_GET['city'])) {
				$projectList = array();
				$projectList = Project::ViewProjectGroupe($type, $type_pay);
			} else {
				$projectList = array();
				$projectList = Project::ViewProjectInCity($type, $type_pay, $_GET['city']);
			}			

			require_once(ROOT.'/views/project/project_groupe.php');

			return true;
		}

		public function actionUser_project()
		{
			$projectList = Project::GetProjectByUserId($_COOKIE['name'], $_COOKIE['sename']);

			require_once(ROOT.'/views/project/user_project.php');

			return true;
		}



	}




?>