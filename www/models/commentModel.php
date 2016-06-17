<?php
class CommentModel extends Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function getAllComments($id)
	{
		$query = sprintf("SELECT users.name, users.id AS userId, comments.comment, comments.created, comments.id FROM comments, users  WHERE comments.user_id = users.id AND art_id=%d ORDER BY comments.id DESC",(int) $id);
		$result = mysqli_query($this->link,$query);
		$number = mysqli_num_rows($result);
		$comments = array();
		for ($i=0; $i < $number; $i++) { 
			$comments[] = mysqli_fetch_assoc($result);
		}
		return $comments;
		
	}

	function addComment( $id, $userId, $created, $comment)
	{
		$comment = trim($comment);
		if (($userId)&&($created)&&($comment))
		{
			$created = prepareLineToQuery($this->link, $created);
			$comment = prepareLineToQuery($this->link, $comment);
			$query = sprintf("INSERT INTO comments ( created, comment, user_id, art_id) 
				VALUES ('%s', '%s', '%d', '%d')", $created, $comment,(int) $userId, (int) $id);

			$result = mysqli_query($this->link,$query);
		}	
	}

	function editComment( $id, $userId, $created, $comment)
	{
		$comment = trim($comment);
		if (($userId)&&($created)&&($comment))
		{
			$created = prepareLineToQuery($this->link, $created);
			$comment = prepareLineToQuery($this->link, $comment);
			$query = sprintf("UPDATE comments SET created='%s', comment ='%s' 
				WHERE id='%d' AND user_id = '%d' ", $created, $comment, (int) $id, (int) $userId);
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