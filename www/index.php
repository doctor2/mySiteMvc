<?php
	require_once("database.php");
	require_once("models/article.php");

	$link = connectDb();
	$records = getAllRecords($link);
	include("views/records.php");
?>

