
<?php 
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
	paginator("/articles/page/",$this->number,$this->pageNumber);
 ?>