<?php 

class AccountModel extends Model
{
	function __construct()
	{
		parent:: __construct();
	}
	
	function getAllUsers()
	{
		$query = "SELECT * FROM users ORDER BY id DESC";
		$result = mysqli_query($this->link,$query);

		$number = mysqli_num_rows($result);
		$records = array();

		for ($i=0; $i < $number; $i++) { 
			$records[] = mysqli_fetch_assoc($result);
		}
		return $records;
	}

	function addUser($login, $email, $password, $name)
	{
		$login = prepareLineToQuery($this->link, $login);
		$email = prepareLineToQuery($this->link, $email);
		$password = prepareLineToQuery($this->link, generatePassword($password));
		$name = prepareLineToQuery($this->link, $name);
		$query = sprintf("INSERT INTO users (login, email, password, name) VALUES ('%s','%s','%s','%s')", $login, $email, $password, $name);
		$result = mysqli_query($this->link, $query);
	}
	
	function getUser($login)
	{
		$query = sprintf("SELECT * FROM users WHERE login ='%s'",  prepareLineToQuery($this->link,$login));
		return mysqli_fetch_assoc(mysqli_query($this->link, $query));
	}
}
?>