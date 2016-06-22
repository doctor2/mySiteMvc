<?php 
class AccountController extends Controller
{
	private $path = "account/";
	function __construct()
	{
		$this->model = new AccountModel();
		parent::__construct();
	}

	function register()
	{
		if (@$_POST['enter']) 
		{
			$result = $this->model->getUserByLogin($_POST['login']);
			if (empty($result)) 
			{
				$this->model->addUser($_POST['login'], $_POST['email'], $_POST['password'], $_POST['name']);
				$result = getUserByLogin($_POST['login']);
				addUserToSession($result);
				exit(header("Location: /"));
			}
		}
		$this->view->generate('Регистрация', $this->path.'register.php');
	}

	function login()
	{
		if (@$_POST['enter'] ) {
			$result = $this->model->getUserByLogin($_POST['login']);
			$password = generatePassword($_POST['password']);
			if  ($password == $result['password'])
			{
				addUserToSession($result);
				if ($result['login'] == 'admin')  exit(header("Location: /admin"));
				if (@$_REQUEST['remember'] ) setcookie('user', $password, strtotime('+30 days'), '/');
				exit(header("Location: /"));
			}
		}
		$this->view->generate('Вход', $this->path.'login.php');
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