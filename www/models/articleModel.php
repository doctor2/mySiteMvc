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
		$records = array();
		while($row = mysqli_fetch_assoc($result))
			$records[] = $row;
		return $records;
	}



	function getLimitedRecords($pageNumber)
	{
		$startPosition = prepareLineToQuery($this->link,((int)$pageNumber-1)*NUMBER_OF_ARTICLES);
		$query = sprintf("SELECT * FROM articles ORDER BY id DESC LIMIT %d, %d", $startPosition, NUMBER_OF_ARTICLES);
		$result = mysqli_query($this->link,$query);
		$records = array();
		while ($row = mysqli_fetch_assoc($result))
			$records[] = $row;
		return $records;
	}

	function searchRecords($content)
	{
		$content = prepareLineToQuery($this->link, $content);
		$query = "SELECT * FROM articles WHERE content LIKE '%$content%' ORDER BY id DESC";
		$result = mysqli_query($this->link,$query);
		$records = array();
		while ($row = mysqli_fetch_assoc($result))
			$records[] = $row;
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
		}
	}

	function deleteRecord( $id)
	{
		$query = sprintf("DELETE FROM articles WHERE id = %d ", (int) $id);
		$result = mysqli_query($this->link, $query);
	}
}
?>