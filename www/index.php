<?php
error_reporting(E_ALL);//выводит все допущенные ошибки
session_start();
require_once("database.php");
$link = connectDb();

if ($_SERVER['REQUEST_URI'] == '/') {
	$page = 'index'; $module = 'index';
} else {
		$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$URL_Parts = explode('/', trim($URL_Path, ' /'));
		$page = array_shift($URL_Parts);
		$module = array_shift($URL_Parts);
		$parametrs = array();
		if (!empty($module)  and count($URL_Parts) == 1)
			$parametrs[$module] = $URL_Parts[0];
		if (!empty($module)  and count($URL_Parts) == 2) {
			$parametrs[$URL_Parts[0]] = $URL_Parts[1];
	}
}


if ($page == 'index') {
	include("views/articles.php");
}
else if ($page == 'article' and $module == 'id') include("/controllers/articleController.php");
else if ($page == 'admin') include("/controllers/adminController.php");
else if ($page == 'account') include("/controllers/accountController.php");


function prepareLineToQuery (&$link, $line) {
	 return mysqli_real_escape_string($link, trim($line));
	// return nl2br(htmlspecialchars(trim($line), ENT_QUOTES), false); для вывода
}

function head($title) 
{
	echo '<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>'.$title.'</title>
		<link rel="stylesheet" href="/resource/style.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	</head>
	<body>
		<header class="header"> <h1><a href="/">Живой журнал представляет!</a>
</h1></header>
		<div class="container">';
}

function footer () 
{
	echo '<footer class="footer">
			Doctor - company © 2013—2016.
			<br> 
			Все права защищены. Информация на сайте не является публичной офертой. 
            </footer>
				</div>
		</body>
		</html>';
}

?>
