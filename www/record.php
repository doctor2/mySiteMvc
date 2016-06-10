<?php
	require_once("database.php");
	require_once("models/article.php");
	require_once("models/comment.php");

	$link = connectDb();

	if (@$_POST['enter']) //$_SERVER['REQUEST_METHOD'] =="POST"
		addComment($link,$_GET['id'],$_POST['created'], $_POST['author'], $_POST['comment']);
	
	$record = getRecord($link, $_GET['id']);
	$comments = getAllComments($link, $_GET['id']);

	
	
	include("views/record.php");



?>