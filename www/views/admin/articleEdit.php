<?php 
head('Редактирование');
?>

<form id="editRecord" name="editRecord" method="post" action="" >
	<p>
		<label for="title">Заголовок заметки</label>
		<input type="text" name="title" id="title" size="100" value = "<?=$record['title']?>" />
	</p>
	<p>
		<label for="date">Дата создания заметки</label>
		<input type="date" name="date" id="date" value="<?=$record['date']?>">
	</p>
	<label for="content"> Текст заметки </label>
	<textarea name="content" id="content" cols="140" rows="19"><?=$record['content']?></textarea>
	<input type="hidden" name = "record" id ="record" value="<?php echo $parametrs['id']?>" />
	<br>
	<input type="submit" name="enter" value="Сохранить" />
	<a href="/admin">Вернуться назад</a>
</form>
<?php
footer();
?>