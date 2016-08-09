<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<input type="text" value="" class="login" name="">
	<input type="text" value="" class="password" name="">
	<form action="" method="get">
		<input type="button" value="" class="log" name="code">
	</form>

	

	<?php 

	require_once("face.php");

$fb = new FBAuth(array(

	"client_id"		=> "530570083816060",
	"client_secret"	=> "905948040ad36c7a32b121acf6627e5a",
	"redirect_uri"	=> "https://booksinf.herokuapp.com/all_project/"
));

if(isset($_GET["code"])){

	if($fb->auth($_GET["code"])){

		// Делаем свои дела
	}
}

if($fb->auth_status){

	echo("Социальный ID пользователя: ".$fb->user_info["id"]);
	echo("<br />");
	echo("Имя пользователя: ".$fb->user_info["first_name"]);
	echo("<br />");
	echo("Фамилия пользователя: ".$fb->user_info["last_name"]);
	echo("<br />");
	echo $fb->user_info["picture"]["data"]["url"];
}else{

	echo("<a href='".$fb->get_link()."'>Войти</a>");
}

	?>
</body>
</html>