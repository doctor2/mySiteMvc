<div class="profilePage">
<?php 
	if (@$_SESSION['USER_FOLDER'] == 0) $Avatar = 0;
	else $Avatar = $_SESSION['USER_FOLDER'].'/'.$_SESSION['USER_ID'];
	echo ' <img src="/content/images/avatar/'.$Avatar.'.jpg" width="120" height="120" alt="Аватар" align="left">'
?>
	<br>
	<label for=""><?=$_SESSION['USER_ID']?></label>
	<br><label for=""><?=$_SESSION['USER_LOGIN']?></label>
	<br><label for=""><?=$_SESSION['USER_NAME']?></label>
	<form action="" method="POST" enctype="multipart/form-data">
		<br><input type="file" name="file">
		<label ><?=@$_SESSION['FILE_ERROR']?></label>
		<input type="submit" name="enter">
	</form>
	<a href="/users/all">Другие пользователи</a>
</div>