<div class="profilePage">
<?php 
	if ($this->user['folder'] == 0) $avatar = 0;
	else $avatar = $this->user['folder'] .'/'.$this->user['id'] ;
	echo ' <img src="/content/images/avatar/'.$avatar.'.jpg" width="120" height="120" alt="Аватар" align="left">'
?>
	<br>
	<br><label for=""><?=$this->user['login']?></label>
	<br><label for=""><?=$this->user['name']?></label>
	<br><label for=""><?=$this->user['email']?></label>
	<a href="/users/all">Другие пользователи</a>
</div>