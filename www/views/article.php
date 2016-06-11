<?php 
	head($record['title']);
	echo '
		<div class="block">
			<h3>'.$record['title'].'</h3>
			<div>Дата публикации: '.$record['date'].'</div>
			<br>
			<div>'.$record['content'].'</div>
		</div>
		<hr>';
		foreach ($comments as &$comment){
			echo '
			<div class="comment">
				<div class="headcomment">
					<div class="author">'.$comment['author'].'</div>   
					<div class="date">'.$comment['created'].'</div>
				</div>
				<hr>
				<div class="content">'.$comment['comment'].'</div>
			</div>';
		}
		
?>			
	<form id="newcomment" name="newcomment"  method="post" autocomplete='on'>
	   <label for="author"> Добавить новый комментарий:  </label>
		<input type="text" name="author" id="author" size="20" maxlength="20"/>
		<br>
		<br>
		<textarea name="comment" cols="55" rows="10" id=" comment"> </textarea>
		<input type="hidden" name = "created" id = "created"
		value ="<?php echo date("Y-m-d");?>"/>
		<input type="submit" name="enter" id="submit" value="Отправить" />
	</form>
	<a href="/">Вернуться на главную</a>
	<br>
<?php footer();?>