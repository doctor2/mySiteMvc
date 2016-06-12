<?php
	function getAllComments($link, $id)
	{
		$query = sprintf("SELECT * FROM comments WHERE art_id=%d ORDER BY id DESC",(int)$id);
		$result = mysqli_query($link,$query);

		if (!$result) die (mysqli_error($link));

		$number = mysqli_num_rows($result);
		$comments = array();

		for ($i=0; $i < $number; $i++) { 
			$comments[] = mysqli_fetch_assoc($result);
		}
			//mysqli_close($link);
		return $comments;
		
	}
	function addComment($link, $id, $created, $author, $comment)
	{
		$comment = trim($comment);
		if (($author)&&($created)&&($comment))
		{
			$author = prepareLineToQuery($link, $author);
			$created = prepareLineToQuery($link, $created);
			$comment = prepareLineToQuery($link, $comment);
			$query = sprintf("INSERT INTO comments (author, created, comment, art_id) VALUES ('%s',
				'%s', '%s', '%d')",$author, $created, $comment, (int) $id);

			$result = mysqli_query($link,$query);
			
			if (!$result) die (mysqli_error($link));
			//mysqli_close($link);
		}	
	}

?>