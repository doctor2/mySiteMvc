<?php
	function getAllComments($link, $id)
	{
		//$query = sprintf("SELECT * FROM comments WHERE art_id=%d ORDER BY id DESC",(int)$id);
		$query = sprintf("SELECT users.name,comments.comment,comments.created FROM comments, users  WHERE comments.user_id = users.id AND art_id=%d ORDER BY comments.id DESC",(int)$id);


		$result = mysqli_query($link,$query);

		if (!$result) die (mysqli_error($link));

		$number = mysqli_num_rows($result);
		$comments = array();

		for ($i=0; $i < $number; $i++) { 
			$comments[] = mysqli_fetch_assoc($result);
		}
		return $comments;
		
	}
	function addComment($link, $id, $userId, $created, $comment)
	{
		$comment = trim($comment);
		if (($userId)&&($created)&&($comment))
		{
			$created = prepareLineToQuery($link, $created);
			$comment = prepareLineToQuery($link, $comment);
			$query = sprintf("INSERT INTO comments ( created, comment, user_id, art_id) VALUES ('%s', '%s', '%d', '%d')", $created, $comment,(int) $userId, (int) $id);

			$result = mysqli_query($link,$query);
			
			if (!$result) die (mysqli_error($link));
			//mysqli_close($link);
		}	
	}

?>