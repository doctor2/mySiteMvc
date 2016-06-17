<?php 
	echo '
			<div class="block">
				<h3>'.$this->record['title'].'</h3>
				<div>Дата публикации: '.$this->record['date'].'</div>
				<br>
				<div>'.nl2br($this->record['content'],false).'</div>
			</div>
			<hr>';
	foreach ($this->comments as $comment)
	{
		$editComment = '';
		if (!empty($_SESSION['USER_ID']) && $comment['userId']==$_SESSION['USER_ID']  ) {
			$editComment = '<a href="/comments/edit/id/'.$comment['id'].'">Редактировать</a>
							<a href="/comments/delete/id/'.$comment['id'].'">Удалить</a>';
		}
		echo '
			<div class="comment">
				<div class="headcomment">
					<div class="author">'.$comment['name'].'</div> 
					<div class="date">'.$comment['created'].'</div>
				</div>
				<hr>';
		if (!empty($_SESSION['COMMENTS_EDIT']) && $_SESSION['COMMENTS_EDIT']==$comment['id']) {
			echo '<form  method="post" action="/comments" autocomplete="on">
				<textarea name="comment" cols="55" rows="3" id=" comment">'.$comment['comment'].'</textarea>
				<input type="hidden" name = "commentId" value ="'.$comment['id'].'"/>
				<input type="hidden" name = "created" id = "created" value ="'. date("Y-m-d H:i:s").'"/>
				<input type="submit" name="save" id="submit" value="Сохранить" />
				<input type="submit" name="cancel" value="Отменить">
				</form>
			</div>';
		}
		else{
			echo '<div class="content">'.nl2br($comment['comment'],false).'</div>
					<div class="commentEdit">'.$editComment.'</div>
			</div>';
		}
	}

	if (!empty($_SESSION['USER_LOGIN'])) {
		echo '<form  name="newcomment"  method="post" autocomplete="on">
				<label for="author"> Добавить новый комментарий:  </label>
				<br>
				<textarea name="comment" cols="55" rows="3" id=" comment"> </textarea>		
				<input type="hidden" name = "created" id = "created" value ="'. date("Y-m-d H:i:s").'"/>
				<br>
				<input type="submit" name="enter" id="submit" value="Добавить" />
				<input type="reset" value="Очистить">
			</form>';
	}
	else
		echo '<label>Добавлять комментарии могут только авторизированные пользователи!!!</label>';
?>			