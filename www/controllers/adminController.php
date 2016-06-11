<?php
	require_once("models/article.php");
	$records = getAllRecords($link);
	// if (@$_POST['enter']) //$_SERVER['REQUEST_METHOD'] =="POST"
	// 	addComment($link,$articleNumber,$_POST['created'], $_POST['author'], $_POST['comment']);

	// $record = getRecord($link, $articleNumber);
	// $comments = getAllComments($link, $articleNumber);
	if ($Module == "editArticle") include("views/articleEdit.php");
	else if ($Module == "createArticle" );
	else if ($Module == "editArticle" );
	else include("views/admin.php");
?>