<?php
error_reporting(E_ALL);//выводит все допущенные ошибки

function connectDb(){
	$localhost = "localhost";
	$db = "mvcdb";
	$user = "admin";
	$password = "1";
	$link = mysqli_connect($localhost, $user, $password, $db) or die("Error: ".mysql_error($link));
	if (!mysqli_set_charset($link,"utf8")) {
		printf("Error: ".mysql_error($link));
	}
	return $link;
}
?>