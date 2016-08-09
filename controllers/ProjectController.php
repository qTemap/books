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

if(isset($_GET["code"])){

	if($fb->auth($_GET["code"])){

		$result = DB :: $dbh->query('SELECT * FROM users WHERE name = ? AND sename = ?', array($fb->user_info["first_name"], $fb->user_info["last_name"]));

		if(!empty($result)) {
			setcookie("name",$result['name'],time()+(1000*60*60*24*30*12));
			setcookie("sename",$result['sename'],time()+(1000*60*60*24*30*12));	
			header("Location: /all_project/"); exit;
		} else {
			DB :: $dbh -> query("INSERT INTO users (name, sename, foto) 
								 VALUES ( ?, ?, ?); 
								 LIMIT 1", 
								 array($fb->user_info["first_name"], $fb->user_info["last_name"], $fb->user_info["picture"]["data"]["url"]));
		}
	}
}

			require_once(ROOT.'/views/project/index.php');

			return true;
		}

	}




?>