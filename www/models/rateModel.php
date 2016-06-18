<?php
class RateModel extends Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function addLike( $id, $userId)
	{
		$query = sprintf("SELECT COUNT(*) AS num FROM rates WHERE  user_id = %d AND art_id = %d",(int) $userId, (int) $id);
		$result = mysqli_query($this->link,$query);
		$number = mysqli_fetch_assoc($result);
		if ($number['num']==0) {
			$query = sprintf("INSERT INTO rates ( user_id, art_id) VALUES ('%d', '%d')",(int) $userId, (int) $id);
			$result = mysqli_query($this->link,$query);
		}
		else{
			$query = sprintf("DELETE FROM rates WHERE  user_id = %d AND art_id = %d",(int) $userId, (int) $id);
			$result = mysqli_query($this->link,$query);
		}
		
	}

	function numberOfLike()
	{
		$query = "SELECT art_id, COUNT(user_id) AS num FROM rates GROUP BY art_id";
		$result = mysqli_query($this->link,$query);
		$records = array();
		while ($row = mysqli_fetch_row($result))
			$records[$row[0]] = $row[1];
		return $records;
	}
}
	

?>