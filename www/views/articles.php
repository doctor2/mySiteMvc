<?php 
require_once("models/article.php");
$records = getAllRecords($link);
head("Главная");
?>
		<div class="adminpanel"><a href="/admin">Панель администратора</a></div>
		<?php 
			if (!empty($_SESSION['USER_LOGIN'])) {
				echo '<label>Здравствуйте, '.$_SESSION['USER_NAME'].' </label><br><a href="/account/logout">Выход</a>';

			}
			else
				echo'<a href="/account/login">Вход</a>
					<a href="/account/register">Регистрация</a>';
		?>
		

		<?php foreach ($records as &$record): ?>
		<div class="block">
			<h3><a href="article/id/<?=$record['id']?>"> <?=$record['title']?></a> </h3>
			<div>Дата публикации: <?=$record['date']?></div>
			<br>
			<div>
				<?=nl2br(substr($record['content'],0,strripos(substr($record['content'],0,650),' ')),false).'...'?>
			</div>
		</div>
		<?php endforeach; ?>
<?php footer();?>
