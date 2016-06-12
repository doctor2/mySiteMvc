<?php
	require_once("models/article.php");
	require_once("models/comment.php");

	if (@$_POST['enter']) //$_SERVER['REQUEST_METHOD'] =="POST"
		addComment($link, $parametrs['id'],$_SESSION['USER_ID'],$_POST['created'], $_POST['comment']);

	$record = getRecord($link, $parametrs['id']);
	$comments = getAllComments($link, $parametrs['id']);
	include("views/article.php");
?>