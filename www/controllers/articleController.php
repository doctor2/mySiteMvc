<?php
	require_once("models/article.php");
	require_once("models/comment.php");

	if (@$_POST['enter']) //$_SERVER['REQUEST_METHOD'] =="POST"
		addComment($link,$articleNumber,$_POST['created'], $_POST['author'], $_POST['comment']);

	$record = getRecord($link, $articleNumber);
	$comments = getAllComments($link, $articleNumber);
	include("views/article.php");
?>