<div class="allUsersPage">
<?php 
	foreach ($this->users as $user) {
		echo '<div class="userElement">';
		if ($user['folder'] == 0) $Avatar = 0;
		else $Avatar = $user['folder'].'/'.$user['id'];
		echo '<a href="/users/user/id/'.$user['id'].'">
				<img src="/content/images/avatar/'.$Avatar.'.jpg" width="120" height="120" alt="Аватар" align="left">
			  </a><br>'.$user['name'];
		echo '</div>';

	}
?>
</div>
