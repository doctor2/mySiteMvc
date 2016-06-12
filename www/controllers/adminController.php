<?php
	if (empty($_SESSION['USER_LOGIN_IN']) or $_SESSION['USER_LOGIN_IN']!=1){
		head('Ошибка');
		echo '<h1><label>У вас недостаточно прав!!!</label></h1>
			<a href="/">Вернуться на главную</a>';
		footer();
		exit();
	}

	require_once("models/article.php");
	$records = getAllRecords($link);


	if (@$_POST['enter'] and $module == 'editArticle') {
		editRecord($link, $parametrs['id'] ,$_POST['title'], $_POST['date'], $_POST['content']);
		header("Location: /admin");
		exit();
	}
	if (@$_POST['enter'] and $module == 'createArticle') {
		addRecord($link, $_POST['title'], $_POST['date'], $_POST['content']);
		header("Location: /admin");
		exit();
	}
	if ( $module == 'deleteArticle' and $parametrs['id']) {
		deleteRecord($link, $parametrs['id']);
		header("Location: /admin");
		exit();
	}

	if ($module == "editArticle" and $parametrs['id']) {
		$record = getRecord($link, $parametrs['id']);
		include("views/admin/articleEdit.php");
	}
	else if ($module == "createArticle" ) include("views/admin/articleCreate.php");
	else include("views/admin/admin.php");
?>
