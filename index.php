<?php

include 'controller/home.php';

$main = new Home();

$uri = explode('/', strtolower(substr($_SERVER['REQUEST_URI'], 1)));

$lang = $uri[0];
$page_url = $uri[1];

// route current page
switch ($page_url) {

	case '/':
	case '':
		$main->index();
		break;

		// ==================== Admin =====================

	case 'login':
		$main->login();
		break;
	case 'login_post':
		$main->login_post();
		break;
	case 'admin':
		$main->admin();
		break;

	default:
		header("HTTP/1.0 404 Not Found");
		// print_r($uri);
		break;
}
