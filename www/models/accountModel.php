<?php 

class AccountModel extends Model
{
	function getAllUsers($link)
	{
		$query = "SELECT * FROM users ORDER BY id DESC";
		$result = mysqli_query($link,$query);

		$number = mysqli_num_rows($result);
		$records = array();

		for ($i=0; $i < $number; $i++) { 
			$records[] = mysqli_fetch_assoc($result);
		}
		return $records;
	}

	function addUser($link, $login, $email, $password, $name);
	{
		$login = prepareLineToQuery($link, $login);
		$email = prepareLineToQuery($link, $email);
		$password = prepareLineToQuery($link, generatePassword($password));
		$name = prepareLineToQuery($link, $name);
		$query = sprintf("INSERT INTO users (login, email, password, name) VALUES ('%s','%s','%s','%s')", $login, $email, $password, $name);
		$result = mysqli_query($link, $query);
	}
	function getUser($link, $login);
	{
		$query = sprintf("SELECT * FROM users WHERE login ='%s'",  prepareLineToQuery($link,$login));
		return mysqli_fetch_assoc(mysqli_query($link, $query));
	}
}
?>