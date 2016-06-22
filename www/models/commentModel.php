<?php
class CommentModel extends Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function getAllComments($id)
	{
		$query = sprintf("SELECT users.name, users.id AS userId, comments.comment, comments.date, comments.id FROM comments, users  WHERE comments.user_id = users.id AND art_id=%d ORDER BY comments.id DESC",(int) $id);
		$result = mysqli_query($this->link,$query);
		$comments = array(); 
		while($row = mysqli_fetch_assoc($result))
			$comments[] = $row;
		return $comments;
		
	}

	function addComment( $id, $userId, $date, $comment)
	{
		$comment = trim($comment);
		if (($userId)&&($date)&&($comment))
		{
			$date = prepareLineToQuery($this->link, $date);
			$comment = prepareLineToQuery($this->link, $comment);
			$query = sprintf("INSERT INTO comments ( date, comment, user_id, art_id) 
				VALUES ('%s', '%s', '%d', '%d')", $date, $comment,(int) $userId, (int) $id);
			$result = mysqli_query($this->link,$query);
		}	
	}

	function editComment( $id, $userId, $date, $comment)
	{
		$comment = trim($comment);
		if (($userId)&&($date)&&($comment))
		{
			$date = prepareLineToQuery($this->link, $date);
			$comment = prepareLineToQuery($this->link, $comment);
			$query = sprintf("UPDATE comments SET date='%s', comment ='%s' 
				WHERE id='%d' AND user_id = '%d' ", $date, $comment, (int) $id, (int) $userId);
			$result = mysqli_query($this->link, $query);
		}
	}

	function deleteComment( $id, $userId)
	{
		$query = sprintf("DELETE FROM comments WHERE id = '%d' AND user_id = '%d'", (int) $id, (int) $userId);
		$result = mysqli_query($this->link, $query);
	}
}
	

?>