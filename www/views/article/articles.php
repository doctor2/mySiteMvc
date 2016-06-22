
<?php 
	foreach ($this->records as $record)
	{
		$like = empty($this->numberOfLike[$record['id']])?0:$this->numberOfLike[$record['id']];
	 	echo'
			<div class="block">
				<h3><a href="/articles/article/id/'.$record['id'].'">'.$record['title'].'</a> </h3>
				<div>Дата публикации: '.$record['date'].' <a href="/rates/article/id/'.$record['id'].'">Нравиться</a>'.
				$like.'</div>
				<br>
				<div>
					'.nl2br(substr($record['content'],0,strripos(substr($record['content'],0,600),' ')),false).'...'.'
				</div>
			</div>';
	}
	paginator($this->path,$this->numberOfRecords,$this->pageNumber);
 ?>