<?php
error_reporting(E_ALL);//выводит все допущенные ошибки
define("NUMBER_OF_ARTICLE",3);

session_start();

require_once("database.php");
$link = connectDb();

if (@$_SESSION['USER_LOGIN_IN'] != 1 and @$_COOKIE['user']) {
	$result = mysqli_fetch_assoc(mysqli_query($link, "SELECT `id`, `name`, `email`, `login` FROM `users` WHERE `password` = '$_COOKIE[user]'"));
	$_SESSION['USER_LOGIN'] = $result['login'];
	$_SESSION['USER_ID'] = $result['id'];
	$_SESSION['USER_NAME'] = $result['name'];
	$_SESSION['USER_EMAIL'] = $result['email'];
	$_SESSION['USER_LOGIN_IN'] = 1;
}


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


if ($page == 'index') include("views/articles.php");
else if ($page == 'articles') include("views/articles.php");
else if ($page == 'article' and @$parametrs['id']) include("/controllers/articleController.php");
else if ($page == 'admin') include("/controllers/adminController.php");
else if ($page == 'account') include("/controllers/accountController.php");


function prepareLineToQuery (&$link, $line) {
	 return mysqli_real_escape_string($link, trim($line));
	// return nl2br(htmlspecialchars(trim($line), ENT_QUOTES), false); для вывода
}

function paginator ($link,$path)
{
	$numberOfPage = ceil(getNumberOfRecords($link)/NUMBER_OF_ARTICLE);
	echo '
		<nav>
	  		<ul class="pagination">';
    for ($i=1; $i <= $numberOfPage; $i++) { 
    	echo '
    	<li><a  href="'.$path.$i.'">'.$i.'</a></li>';
    }
    echo '  </ul>
		</nav>';
}

function generatePassword ($password) {
	return md5('@!Doc25'.md5('632'.$password.'123'));
}

function head($title) 
{
	echo '<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>'.$title.'</title>
		<link rel="stylesheet" href="/content/style.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	</head>
	<body>
		<div class="container">
		<header class="header"> 
			<h1><a href="/">Живой журнал представляет!</a></h1>				
		</header>
		';
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
