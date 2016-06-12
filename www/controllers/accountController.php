<?php 
	if (@$_POST['enter'] and $module == 'login') {

		$query = sprintf("SELECT * FROM users WHERE login ='%s'",  prepareLineToQuery($link,$_POST['login']));
		$result = mysqli_fetch_assoc(mysqli_query($link, $query));

		if  (md5($_POST['password']) == $result['password'])
		{
			$_SESSION['USER_ID'] = $result['id'];
			$_SESSION['USER_LOGIN'] = $result['login'];
			$_SESSION['USER_NAME'] = $result['name'];
			$_SESSION['USER_PASSWORD'] = $result['password'];
			$_SESSION['USER_LOGIN_IN'] = ($result['login'] == 'admin') ?1:0 ;
			if ($result['login'] == 'admin') {
				header("Location: /admin");
				exit();
			}
			header("Location: /");
			exit();
		}
		
	}
	if (@$_POST['enter'] and $module == 'register') {

		$query = sprintf("SELECT * FROM users WHERE login ='%s'",  prepareLineToQuery($link,$_POST['login']));
		$result = mysqli_num_rows(mysqli_query($link, $query));
		if ($result !=1)
		{
			$login = prepareLineToQuery($link, $_POST['login']);
			$email = prepareLineToQuery($link, $_POST['email']);
			$password = prepareLineToQuery($link, md5($_POST['password']));
			$name = prepareLineToQuery($link, $_POST['name']);
			$query = sprintf("INSERT INTO users (login, email, password, name) VALUES ('%s','%s','%s','%s')", $login, $email, $password, $name);
			$result = mysqli_query($link, $query);
			$_SESSION['USER_ID'] = 2;
			$_SESSION['USER_LOGIN'] = $login;
			$_SESSION['USER_NAME'] = $name;
			$_SESSION['USER_PASSWORD'] = $password;
			$_SESSION['USER_LOGIN_IN'] = ($name == 'admin') ?1:0;
			header("Location: /");
			exit();
		}

	}

	
	if ($module == 'login') include("/views/login.php");
	else if ($module == 'register') include('/views/register.php');
	else if ($module == 'logout') {
		session_destroy();
		header("Location: /");
		;}
 	
?>