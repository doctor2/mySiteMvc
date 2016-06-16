<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="/content/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<body>
	<div class="container">
		<header class="header"> 
			<h1><a href="/">Живой журнал представляет!</a></h1>			
		</header>
		
		
		<nav class="topMenu">
			<div class="userPanel">	
				<ul>
					<?php
						if (!empty($_SESSION['USER_LOGIN']) ) {
							echo '<li><label>Здравствуйте, '.$_SESSION['USER_NAME'].' </label></li>
									<li><a href="/account/logout">Выход</a></li>';
						}
						else
							echo'<li><a href="/account/login">Вход</a></li>
								<li><a href="/account/register">Регистрация</a></li>';
					?>	

				</ul>
			</div>
			<div>
				<ul class="main-menu ">
					<li> <a href="/">Главная</a></li>
					<li><a href="">Новости</a>
						<ul class="sub-menu">
		                    <li><a href="#1">Разработка</a></li>
		                    <li><a href="#2">Продвижение</a></li>
		                    <li><a href="#3">Контекст</a></li>
		                </ul>	
					</li>
					<li><a href="#team">Сотрудники</a></li>
				</ul>
			</div>
		</nav>
		<div class="page">
			<?php include '/views/'.$content; ?>
		</div>
		<footer class="footer">
			Doctor - company © 2013—2016.
			<br> 
			Все права защищены. Информация на сайте не является публичной офертой. 
		</footer>
	</div>
</body>
</html>