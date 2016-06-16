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
			$result = $this->model->getUser($_POST['login']);
			if (empty($result)) //может быть касяк!!!!!!!!!!!!!!!!!
			{
				$this->model->addUser($_POST['login'], $_POST['email'], $_POST['password'], $_POST['name']);
				$result = getUser($_POST['login']);
				$_SESSION['USER_ID'] = $result['id'];
				$_SESSION['USER_LOGIN'] = $result['login'];
				$_SESSION['USER_NAME'] = $result['name'];
				$_SESSION['USER_PASSWORD'] = $result['password'];
				$_SESSION['USER_LOGIN_IN'] = ($result['login'] == 'admin') ?666:1 ;

				header("Location: /");
				exit();
			}
		}
		$this->view->generate('Регистрация', $this->path.'register.php');
	}

	function login()
	{
		if (@$_POST['enter'] ) {
			$result = $this->model->getUser($_POST['login']);
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