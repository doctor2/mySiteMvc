<?php

class UsersController extends Controller
{
	private $path = 'user/';

	function __construct()
	{
		parent::__construct();
		$this->model = new AccountModel();
	}

	function profile()
	{
		unset($_SESSION['FILE_ERROR']);
		if (@$_FILES['file']['tmp_name']) 
		{
			$imageinfo = getimagesize($_FILES['file']['tmp_name']);
			if ($_FILES['file']['type'] != 'image/jpeg') $_SESSION['FILE_ERROR']='Неверный формат файла'; 
			else if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg')  $_SESSION['FILE_ERROR']='неверный формат файла'; 
			else if ($_FILES['file']['size'] > 40000) $_SESSION['FILE_ERROR'] ='Размер изображения слишком большой.';
			else if (empty($_SESSION['USER_FOLDER'])) 
			{
				$files = glob('./content/images/avatar/*', GLOB_ONLYDIR);
				$numDir = 0;
				foreach($files as $dir) 
				{
					$numDir ++;
					$count = sizeof(glob($dir.'/*.*'));
					if ($count < 250) 
					{
						$uploadfile = $dir.'/'.$_SESSION['USER_ID'];
						$_SESSION['USER_FOLDER'] = $numDir;
						$this->model->addFolder($numDir, $_SESSION['USER_ID']);
						break;
					}
				}
			}
			else $uploadfile = 'content/images/avatar/'.$_SESSION['USER_FOLDER'].'/'.$_SESSION['USER_ID'];
			if (!empty($uploadfile))move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile.'.jpg');
			unset($_FILES);	
		}
		else $_SESSION['FILE_ERROR']='Файл не выбран';
		$this->view->generate('Профиль',$this->path.'index.php');
	}

	function all()
	{
		$this->view->set('users', $this->model->getAllUsers());
		$this->view->generate('Пользователи',$this->path.'all.php');
	}

	function user()
	{
		if (!empty($this->params['id'])){
			$user = $this->model->getUserById($this->params['id']);
			$this->view->set('user', $user);
			if ($user['id'] == $_SESSION['USER_ID']) exit(header('Location: /users/profile/'));
			$this->view->generate($user['name'], $this->path.'user.php');
		}
	}

}
?>