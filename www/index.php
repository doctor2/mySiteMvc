<?php
	require_once("database.php");
	require_once("models/article.php");

	if ($_SERVER['REQUEST_URI'] == '/') {
	$Page = 'index';
	$Module = 'index';
} else {
	$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	print_r($URL_Path);	
	$URL_Parts = explode('/', trim($URL_Path, ' /'));
	print_r($URL_Parts);
	$Page = array_shift($URL_Parts);
	print_r($Page);
	$Module = array_shift($URL_Parts);
	print_r($Module);


	if (!empty($Module)) {
		$Param = array();
		for ($i = 0; $i < count($URL_Parts); $i++) {
			$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
		}
	}
}

	$link = connectDb();
	$records = getAllRecords($link);
	if ($Page == 'index') include("views/records.php");
	if ($Page == 'record') include("views/records.php");
?>

