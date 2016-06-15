<?php
class ArticleController extends Controller
{
	$path = "article/";
	function __construct()
	{
		require_once("/models/article.php");
		require_once("/models/comment.php");
		$this->model = new ArticleModel();
		$this->view = new View();
	}

	function index()
	{
		if (!empty($parametrs) && $parametrs['page'])
			$records = $this->model->getLimitedRecords($link, $parametrs['page']);
		else
			$records = $this->model->getLimitedRecords($link, 1);
		$this->view->generate(this->$path.'articles.php', 'template_view.php', $records);
	}

	function id()
	{
		if (@$_POST['enter'] && $parametrs['id']) //$_SERVER['REQUEST_METHOD'] =="POST"
		addComment($link, $parametrs['id'],$_SESSION['USER_ID'],$_POST['created'], $_POST['comment']);
		$record = this->model->getRecord($link, $parametrs['id']);
		$comments = this->model->getAllComments($link, $parametrs['id']);
	}

		
 
		

		
		include("views/article.php");
}
?>