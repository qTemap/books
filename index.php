<?php 

if($_SERVER['REQUEST_URI'] == '/') {
	header("Location: filtre"); exit;


ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/component/Router.php');
require_once(ROOT.'/component/database.php');



$router = new Router();
$router->run();

} else {
	ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/component/Router.php');
require_once(ROOT.'/component/database.php');



$router = new Router();
$router->run();
}

?>