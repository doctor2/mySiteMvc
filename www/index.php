<?php
error_reporting(E_ALL);//выводит все допущенные ошибки
// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once("database.php");
require_once("settings.php");
$link = connectDb();
/*
Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
	> аутентификацию
	> кеширование
	> работу с формами
	> абстракции для доступа к данным
	> ORM
	> Unit тестирование
	> Benchmarking
	> Работу с изображениями
	> Backup
	> и др.
*/

require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор












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
