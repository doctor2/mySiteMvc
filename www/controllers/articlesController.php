<?php

class ArticlesController extends Controller
{
	private $modelComment;
	private $path = 'article/';

	function __construct()
	{
		parent::__construct();
		$this->model = new ArticleModel();
		$this->modelComment = new CommentModel();
	}

	function index()
	{
		if (!empty($this->params['page'])){
			$records = $this->model->getLimitedRecords($this->params['page']);
			$this->view->set('pageNumber', $this->params['page']);
		}
		else{
			$records = $this->model->getLimitedRecords(1);
			$this->view->set('pageNumber', 1);
		}
		$this->view->set('number', $this->model->getNumberOfRecords());
		$this->view->set('activePage', $records);
		$this->view->set('records', $records);
		$this->view->generate('Главная',$this->path.'articles.php');
	}

	function id()
	{
		if (@$_POST['enter'] && $this->params['id']) //$_SERVER['REQUEST_METHOD'] =="POST"
		$this->modelComment->addComment($this->params['id'],$_SESSION['USER_ID'],$_POST['created'], $_POST['comment']);
		$record = $this->model->getRecord($this->params['id']);
		$comments = $this->modelComment->getAllComments($this->params['id']);
		if (!empty($record))
		{
			$this->view->set('record', $record);
			$this->view->set('comments', $comments);
			$this->view->generate($record['title'],$this->path.'article.php');
		} else Route::ErrorPage404();

		
	}
}
?>