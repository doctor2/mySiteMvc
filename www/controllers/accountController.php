<?php 
class AccountController extends Controller
{
	$path = "account/";
	function __construct()
	{
		$this->model = new AccountModel();
		$this->view = new View();
	}

	function register()
	{
		if (@$_POST['enter']) 
		{
			$result = getUser($link, $_POST['login'];
			if (empty($result) //может быть касяк!!!!!!!!!!!!!!!!!
			{
				addUser($link, $_POST['login'], $_POST['email'], $_POST['password'], $_POST['name']);
				$result = getUser($link, $_POST['login'];
				$_SESSION['USER_ID'] = $result['id'];
				$_SESSION['USER_LOGIN'] = $result['login'];
				$_SESSION['USER_NAME'] = $result['name'];
				$_SESSION['USER_PASSWORD'] = $result['password'];
				$_SESSION['USER_LOGIN_IN'] = ($result['login'] == 'admin') ?666:1 ;

				header("Location: /");
				exit();
			}
		}
		$this->view->generate($path.'register.php', 'template_view.php');
	}

	function login()
	{
		if (@$_POST['enter'] and $module == 'login') {
			$result = getUser($link, $_POST['login'];
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
			$this->view->generate($path.'login.php', 'template_view.php', $data);

		}
	}

	function logout()
	{
		if (@$_COOKIE['user']) {
			setcookie('user', '', strtotime('-30 days'), '/');
			unset($_COOKIE['user']);
		}
		session_unset();
		header("Location: /");
	}
}

?>