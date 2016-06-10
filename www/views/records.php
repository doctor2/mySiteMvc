<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Простой блог</title>
	<link rel="stylesheet" href="style.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<body>
	<div class="container">
		<h1>Одно объявление</h1>
		<a href="admin">Панель администратора</a>
		<?php foreach ($records as &$record): ?>
		<div class="block">
			<h3><a href="record.php?id=<?=$record['id']?>"> <?=$record['title']?></a> </h3>
			<div>Дата публикации: <?=$record['date']?></div>
			<br>
			<div>
				<?=$record['content']?>
			</div>
		</div>
		<?php endforeach; ?>
		<footer>
			<p>Заметки</p>
		</footer>
	</div>
</body>
</html>