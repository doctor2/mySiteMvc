<?php

function prepareLineToQuery (&$link, $line) 
{
	 return mysqli_real_escape_string($link, trim($line));
	// return nl2br(htmlspecialchars(trim($line), ENT_QUOTES), false); для вывода
}

function addUserToSession(array $result)
{
	// foreach ($result as $key => $value) $_SESSION['USER_'.$key] = $value;
	if (!empty($result)) {
		$_SESSION['USER_ID'] = $result['id'];
		$_SESSION['USER_LOGIN'] = $result['login'];
		$_SESSION['USER_NAME'] = $result['name'];
		$_SESSION['USER_PASSWORD'] = $result['password'];
		$_SESSION['USER_LOGIN_IN'] = ($result['login'] == 'admin') ?666:1 ;
		$_SESSION['USER_FOLDER'] = $result['folder'];
	}	
}

function minimazeImage($imageDir, $savingDir, $newWidth, $newHeight, $quality = 50) {
/*
$imageDir - Путь к изображению, которое нужно уменьшить.
$savingDir - Директория, куда будет сохранена уменьшенная копия.
$newWidth - Ширина уменьшенной копии.
$newHeight - Высота уменьшенной копии.
$quality - Качество уменьшенной копии.
*/
$Scr = imagecreatefromjpeg($imageDir);
$Size = getimagesize($imageDir);
$Tmp = imagecreatetruecolor($newWidth, $newHeight);
imagecopyresampled($Tmp, $Scr, 0, 0, 0, 0, $newWidth, $newHeight, $Size[0], $Size[1]);
imagejpeg($Tmp, $savingDir, $quality);
imagedestroy($Scr);
imagedestroy($Tmp);
}

function generatePassword ($password) 
{
	return md5('@!Doc25'.md5('632'.$password.'123'));
}

function paginator ($path,$number, $pageNumber)
{
	$numberOfPage = ceil($number/NUMBER_OF_ARTICLE);
	echo '
		<nav>
	  		<ul class="paginator">';
    for ($i=1; $i <= $numberOfPage; $i++) { 
    	$class = ($i==$pageNumber)?'active':'';
    	echo '<li><a class="'.$class.'" href="'.$path.$i.'">'.$i.'</a></li>';
    }
    echo '  </ul>
		</nav>';
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