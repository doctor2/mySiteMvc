<?php
require_once("database.php");
$link = connectDb();

if ($_SERVER['REQUEST_URI'] == '/') {
	$Page = 'index';
	$Module = 'index';
} else {
	$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	// print_r($URL_Path);	
	// echo '1<br>';
	$URL_Parts = explode('/', trim($URL_Path, ' /'));
	// print_r($URL_Parts);
	// echo '2<br>';
	$Page = array_shift($URL_Parts);
	// print_r($Page);
	// echo '<br>';
	$Module = array_shift($URL_Parts);
	// print_r($Module);
	// print_r($URL_Parts);

	$articleNumber = 0;
	if (!empty($Module)  and !empty($URL_Parts)) {
		$articleNumber = $URL_Parts[0];
	}
}


if ($Page == 'index') include("views/articles.php");
else if ($Page == 'article' and $Module == 'id') include("/controllers/articleController.php");
else if ($Page == 'admin') include("/controllers/adminController.php");




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
