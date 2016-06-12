<?php 
	
head("Панель администратора");
?>
<div class="table">
	<table >
		<tr>
			<th>ID</th>
			<th>Заголовок</th>
			<th>Контент</th>
			<th>Дата</th>
			<th>Редактирование</th>
			<th>Удаление</th>
		</tr>
		<?php
		foreach ($records as &$record){
			echo '
			<tr>
				<td>'.$record['id'].'</td>
				<td>'.$record['title'].'</td> 
				<td>'.substr($record['content'],0,strripos(substr($record['content'],0,700),' ')).'</td>
				<td>'.$record['date'].'</td>
				<td><a href="/admin/editArticle/id/'.$record['id'].'">Редактировать</a></td>
				<td><a href="/admin/deleteArticle/id/'.$record['id'].'">Удалить</a></td>
			</tr>';
		}
		?>
	</table>
	<a href="admin/createArticle">Добавить запись</a>
</div>

<?php 
footer();
?>