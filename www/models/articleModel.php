<?php

class ArticleModel extends Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function getAllRecords()
	{
		$query = "SELECT * FROM articles ORDER BY id DESC";
		$result = mysqli_query($this->link,$query);

		if (!$result) die (mysqli_error($this->link));

		$number = mysqli_num_rows($result);
		$records = array();

		for ($i=0; $i < $number; $i++) { 
			$records[] = mysqli_fetch_assoc($result);
		}
		return $records;
	}

	function getLimitedRecords($part)
	{
		$part = prepareLineToQuery($this->link,((int)$part-1)*NUMBER_OF_ARTICLE);
		$query = sprintf("SELECT * FROM articles ORDER BY id DESC LIMIT %d,%d", $part,NUMBER_OF_ARTICLE);
		$result = mysqli_query($this->link,$query);

		if (!$result) die (mysqli_error($this->link));

		$number = mysqli_num_rows($result);
		$records = array();

		for ($i=0; $i < $number; $i++) { 
			$records[] = mysqli_fetch_assoc($result);
		}
		return $records;
	}

	function getNumberOfRecords()
	{
		$query = "SELECT COUNT(*) AS num FROM articles";
		$result =  mysqli_fetch_assoc(mysqli_query($this->link,$query));
		return $result['num'];
	}

	function getRecord($id)
	{
		$query = sprintf("SELECT * FROM articles WHERE id=%d",(int) $id);
		$result = mysqli_query($this->link, $query);

		if (!$result) die (mysqli_error($this->link));

		$record = mysqli_fetch_assoc($result);

		return $record;
	}

	function addRecord( $title, $date, $content)
	{
		$content = trim($content);
		if (($title)&&($date)&&($content))
		{
			$title = prepareLineToQuery($this->link, $title);
			$date = prepareLineToQuery($this->link, $date);
			$content = prepareLineToQuery($this->link, $content);
			$query = sprintf("INSERT INTO articles (title, date, content) VALUES ('%s','%s', '%s')", $title, $date, $content);
			$result = mysqli_query($this->link, $query);

			if (!$result) die (mysqli_error($this->link));
		}
	}

	function editRecord( $id, $title, $date, $content)
	{
		$content = trim($content);
		if (($title)&&($date)&&($content))
		{
			$title = prepareLineToQuery($this->link, $title);
			$date = prepareLineToQuery($this->link, $date);
			$content = prepareLineToQuery($this->link, $content);
			$query = sprintf("UPDATE articles SET title='%s', date='%s', 
				content='%s' WHERE id=%d ", $title, $date, $content, (int) $id);
			$result = mysqli_query($this->link, $query);

			if (!$result) die (mysqli_error($this->link));
		}
	}

	function deleteRecord( $id)
	{
		$query = sprintf("DELETE FROM articles WHERE id = %d ", (int) $id);
		$result = mysqli_query($this->link, $query);
		if (!$result) die (mysqli_error($this->link));
	}
}
?>