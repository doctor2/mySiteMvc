<?php 
	if (@$_POST['enter'] and $module == 'login') {

		$query = sprintf("SELECT * FROM users WHERE login ='%s'",  prepareLineToQuery($link,$_POST['login']));
		$result = mysqli_fetch_assoc(mysqli_query($link, $query));
		$password = generatePassword($_POST['password']);
		if  ($password == $result['password'])
		{
			$_SESSION['USER_ID'] = $result['id'];
			$_SESSION['USER_LOGIN'] = $result['login'];
			$_SESSION['USER_NAME'] = $result['name'];
			$_SESSION['USER_PASSWORD'] = $result['password'];
			$_SESSION['USER_LOGIN_IN'] = ($result['login'] == 'admin') ?666:1 ;
			if ($result['login'] == 'admin') {
				header("Location: /admin");
				exit();
			}
			if (@$_REQUEST['remember'] ) setcookie('user', $password, strtotime('+30 days'), '/');
			exit(header("Location: /"));
		}

		
	}
	if (@$_POST['enter'] and $module == 'register') 
	{
		$query = sprintf("SELECT * FROM users WHERE login ='%s'",  prepareLineToQuery($link,$_POST['login']));
		$result = mysqli_num_rows(mysqli_query($link, $query));
		if ($result !=1)
		{
			$login = prepareLineToQuery($link, $_POST['login']);
			$email = prepareLineToQuery($link, $_POST['email']);
			$password = prepareLineToQuery($link, generatePassword($_POST['password']));
			$name = prepareLineToQuery($link, $_POST['name']);
			$query = sprintf("INSERT INTO users (login, email, password, name) VALUES ('%s','%s','%s','%s')", $login, $email, $password, $name);
			$result = mysqli_query($link, $query);


			$query = sprintf("SELECT * FROM users WHERE login ='%s'",  $login);
			$result = mysqli_fetch_assoc(mysqli_query($link, $query));
			$_SESSION['USER_ID'] = $result['id'];
			$_SESSION['USER_LOGIN'] = $result['login'];
			$_SESSION['USER_NAME'] = $result['name'];
			$_SESSION['USER_PASSWORD'] = $result['password'];
			$_SESSION['USER_LOGIN_IN'] = ($result['login'] == 'admin') ?666:1 ;

			header("Location: /");
			exit();
		}
	}

	
	if ($module == 'login') include("/views/login.php");
	else if ($module == 'register') include('/views/register.php');
	else if ($module == 'logout') 
	{
		if (@$_COOKIE['user']) {
			setcookie('user', '', strtotime('-30 days'), '/');
			unset($_COOKIE['user']);
		}
		session_unset();
		header("Location: /");
	}
 	
?>