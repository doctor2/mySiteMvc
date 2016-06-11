<?php 
require_once("models/article.php");
$records = getAllRecords($link);
head("Главная");
?>
		<div class="adminpanel"><a href="/admin">Панель администратора</a></div>
		
		<?php foreach ($records as &$record): ?>
		<div class="block">
			<h3><a href="article/id/<?=$record['id']?>"> <?=$record['title']?></a> </h3>
			<div>Дата публикации: <?=$record['date']?></div>
			<br>
			<div>
				<?=$record['content']?>
			</div>
		</div>
		<?php endforeach; ?>
<?php footer();?>
