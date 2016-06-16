<?php

class ArticleController extends Controller
{
	private $modelComment;
	private $path = 'article/';

	function __construct()
	{
		$this->model = new ArticleModel();
		$this->modelComment = new CommentModel();
		$this->view = new View();
		$this->link = connectDb();
	}

	function index()
	{
		if (!empty($this->params['page']))
			$records = $this->model->getLimitedRecords($this->link, $this->params['page']);
		else
			$records = $this->model->getLimitedRecords($this->link, 1);
		$this->view->set('number', $this->model->getNumberOfRecords($this->link));
		$this->view->set('records', $records);
		$this->view->generate('Главная',$this->path.'articles.php');
	}

	function id()
	{
		if (@$_POST['enter'] && $this->params['id']) //$_SERVER['REQUEST_METHOD'] =="POST"
		$this->modelComment->addComment($this->link, $this->params['id'],$_SESSION['USER_ID'],$_POST['created'], $_POST['comment']);
		$record = $this->model->getRecord($this->link, $this->params['id']);
		$comments = $this->modelComment->getAllComments($this->link, $this->params['id']);
		$this->view->set('record', $record);
		$this->view->set('comments', $comments);
		$this->view->generate('Главная',$this->path.'article.php');
	}
}
?>