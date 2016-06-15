<?php
class AdminController extends Controller
{
	//При создании объекта класса имя передается в эту функцию
	// function __autoload($class_name) 
	// {
	// 	include "$class_name.php";
	// }
	function __construct()
	{
		require_once("models/article.php");
		$this->model = new ArticlModel();
		$this->view = new View();
	}
	private function checkAccess()
	{
		if (empty($_SESSION['USER_LOGIN_IN']) or $_SESSION['USER_LOGIN_IN']!=666){
		head('Ошибка');
		echo '<h1><label>У вас недостаточно прав!!!</label></h1>
			<a href="/">Вернуться на главную</a>';
		footer();
		exit();
		}
	}

	function editArticle()
	{
		checkAccess();
		if (@$_POST['enter']) {
			editRecord($link, $parametrs['id'] ,$_POST['title'], $_POST['date'], $_POST['content']);
			header("Location: /admin");
			exit();
		}

	}

	function createArticle()
	{
		checkAccess();
		if (@$_POST['enter']) {
			addRecord($link, $_POST['title'], $_POST['date'], $_POST['content']);
			header("Location: /admin");
			exit();
		}
		
	}

	function deleteArticle()
	{
		checkAccess();
		if ( $parametrs['id']) {
			deleteRecord($link, $parametrs['id']);
			header("Location: /admin");
			exit();
		}
		
	}

	
	
	


	if ($module == "editArticle" and $parametrs['id']) {
		$record = getRecord($link, $parametrs['id']);
		include("views/admin/articleEdit.php");
	}
	else if ($module == "createArticle" ) include("views/admin/articleCreate.php");
	else 
	{
		if (!empty($parametrs) && @$parametrs['page'])
			$records = getLimitedRecords($link, $parametrs['page']);
		else
			$records = getLimitedRecords($link, 1);
		include("views/admin/admin.php");
	}
}
?>
