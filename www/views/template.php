<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$this->title?></title>
	<link rel="stylesheet" href="/content/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<body>
	<div class="container">
		<header class="header"> 
			<h1><a href="/">Живой журнал представляет!</a></h1>				
		</header>
		<?php include '/views/'.$this->content; ?>
		<footer class="footer">
			Doctor - company © 2013—2016.
			<br> 
			Все права защищены. Информация на сайте не является публичной офертой. 
		</footer>
	</div>
</body>
</html>