<div class="adminpanel"><a href="/admin">Панель администратора</a></div>
<?php 

	if (!empty($_SESSION['USER_LOGIN'])) {
		echo '<label>Здравствуйте, '.$_SESSION['USER_NAME'].' </label>
				<br><a href="/account/logout">Выход</a>';
	}
	else
		echo'<a href="/account/login">Вход</a>
			<a href="/account/register">Регистрация</a>';

	foreach ($this->records as $record)
	 	echo'
			<div class="block">
				<h3><a href="/articles/id/'.$record['id'].'">'.$record['title'].'</a> </h3>
				<div>Дата публикации: '.$record['date'].'</div>
				<br>
				<div>
					'.nl2br(substr($record['content'],0,strripos(substr($record['content'],0,600),' ')),false).'...'.'
				</div>
			</div>';
	paginator("/articles/page/",$this->number);
 ?>