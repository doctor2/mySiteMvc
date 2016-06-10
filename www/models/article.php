<?php
	function getAllRecords($link){
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

	function getRecord($link, $id)
	{
		$query = sprintf("SELECT * FROM articles WHERE id=%d",(int) $id);
		$result = mysqli_query($link, $query);

		if (!$result) die (mysqli_error($link));

		$record = mysqli_fetch_assoc($result);

		return $record;
	}

	function addRecord($title, $date, $content){
		
	}

	function editRecord($id, $title, $date, $content){
		
	}

	function deleteRecord($id){
		
	}
?>