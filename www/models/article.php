<?php
function getAllRecords($link)
{
	$query = "SELECT * FROM articles ORDER BY id DESC";
	$result = mysqli_query($link,$query);

	if (!$result) die (mysqli_error($link));

	$number = mysqli_num_rows($result);
	$records = array();

	for ($i=0; $i < $number; $i++) { 
		$records[] = mysqli_fetch_assoc($result);
	}
	return $records;
}
function getNumberOfRecords($link)
{
	$query = "SELECT COUNT(*) AS num FROM articles";
	$result =  mysqli_fetch_assoc(mysqli_query($link,$query));
	return $result['num'];
}
function getLimitedRecords($link,$part)
{
	$part = ((int)$part-1)*NUMBER_OF_ARTICLE;
	$query = sprintf("SELECT * FROM articles ORDER BY id DESC LIMIT %d,%d",$part,NUMBER_OF_ARTICLE);
	$result = mysqli_query($link,$query);

	if (!$result) die (mysqli_error($link));

	$number = mysqli_num_rows($result);
	$records = array();

	for ($i=0; $i < $number; $i++) { 
		$records[] = mysqli_fetch_assoc($result);
	}
	return $records;
}

function getRecord($link, $id)
{
	$query = sprintf("SELECT * FROM articles WHERE id=%d",(int) $id);
	$result = mysqli_query($link, $query);

	if (!$result) die (mysqli_error($link));

	$record = mysqli_fetch_assoc($result);

	return $record;
}

function addRecord($link, $title, $date, $content)
{
	$content = trim($content);
	if (($title)&&($date)&&($content))
	{
		$title = prepareLineToQuery($link, $title);
		$date = prepareLineToQuery($link, $date);
		$content = prepareLineToQuery($link, $content);
		$query = sprintf("INSERT INTO articles (title, date, content) VALUES ('%s','%s', '%s')", $title, $date, $content);
		$result = mysqli_query($link, $query);

		if (!$result) die (mysqli_error($link));
	}
}

function editRecord($link, $id, $title, $date, $content)
{
		$content = trim($content);
	if (($title)&&($date)&&($content))
	{
		$title = prepareLineToQuery($link, $title);
		$date = prepareLineToQuery($link, $date);
		$content = prepareLineToQuery($link, $content);
		$query = sprintf("UPDATE articles SET title='%s', date='%s', 
			content='%s' WHERE id=%d ", $title, $date, $content, (int) $id);
		$result = mysqli_query($link, $query);

		if (!$result) die (mysqli_error($link));
	}
}

function deleteRecord($link, $id)
{
	$query = sprintf("DELETE FROM articles WHERE id = %d ", (int) $id);
		$result = mysqli_query($link, $query);
		if (!$result) die (mysqli_error($link));
}
?>