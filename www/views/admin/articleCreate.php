<form id="addRecord" name="addRecord" method="post" action="" >
	<p>
		<label for="title">Заголовок заметки</label>
		<input type="text" name="title" id="title" size="100" placeholder="Название статьи" />
	</p>
	<p>
		<label for="date">Дата создания заметки</label>
		<input type="date" name="date" id="date" value="<?=date('Y-m-d')?>">
	</p>
	<label for="content"> Текст заметки </label>
	<textarea name="content" id="content" cols="140" rows="19" placeholder="Содержание статьи"></textarea>
	<br>
	<input type="submit" name="enter" value="Сохранить" />
	<a href="/admin">Вернуться назад</a>
</form>