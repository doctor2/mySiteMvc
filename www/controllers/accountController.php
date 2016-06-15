<?php 
class AccountController extends Controller
{
	private $path = "account/";
	function __construct()
	{
		require_once("./database.php");
		require_once ("./models/accountModel.php");
		$this->model = new AccountModel();
		$this->view = new View();
		$this->link = connectDb();
	}

	function register()
	{
		if (@$_POST['enter']) 
		{
			$result = $this->model->getUser($this->link, $_POST['login']);
			if (empty($result)) //может быть касяк!!!!!!!!!!!!!!!!!
			{
				$this->model->addUser($this->link, $_POST['login'], $_POST['email'], $_POST['password'], $_POST['name']);
				$result = getUser($this->link, $_POST['login']);
				$_SESSION['USER_ID'] = $result['id'];
				$_SESSION['USER_LOGIN'] = $result['login'];
				$_SESSION['USER_NAME'] = $result['name'];
				$_SESSION['USER_PASSWORD'] = $result['password'];
				$_SESSION['USER_LOGIN_IN'] = ($result['login'] == 'admin') ?666:1 ;

				header("Location: /");
				exit();
			}
		}
		$this->view->set('title', 'Регистрация');
		$this->view->set('content', $this->path.'register.php');
		$this->view->generate();
	}

	function login()
	{
		if (@$_POST['enter'] ) {
			$result = $this->model->getUser($this->link, $_POST['login']);
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
		$this->view->set('title', 'Вход');
		$this->view->set('content', $this->path.'login.php');
		$this->view->generate();
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