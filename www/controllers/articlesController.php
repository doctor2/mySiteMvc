<?php

class ArticlesController extends Controller
{
	private $modelComment;
	private $modelRate;
	private $path = 'article/';

	function __construct()
	{
		parent::__construct();
		$this->model = new ArticleModel();
		$this->modelComment = new CommentModel();
		$this->modelRate = new RateModel();
	}

	function index()
	{
		unset($_SESSION['SEARCH']);
		if (!empty($this->params['page'])){
			$records = $this->model->getLimitedRecords($this->params['page']);
			$this->view->set('pageNumber', $this->params['page']);
		}
		else{
			$records = $this->model->getLimitedRecords(1);
			$this->view->set('pageNumber', 1);
		}
		$this->view->set('numberOfLike', $this->modelRate->numberOfLike());
		$this->view->set('numberOfRecords', $this->model->getNumberOfRecords());
		$this->view->set('records', $records);
		$this->view->set('path', "/articles/page/");
		$this->view->generate('Главная',$this->path.'articles.php');
	}

	function article()
	{
		if (empty($this->params['id'])) Route::errorPage404();
		
		if (@$_POST['enter'] && $this->params['id']) 
			$this->modelComment->addComment($this->params['id'],$_SESSION['USER_ID'],$_POST['date'], $_POST['comment']);

		$record = $this->model->getRecord($this->params['id']);
		if (empty($record)) Route::errorPage404();
		$comments = $this->modelComment->getAllComments($this->params['id']);
		$this->view->set('record', $record);
		$this->view->set('comments', $comments);
		$this->view->generate($record['title'],$this->path.'article.php');		
	}
}
?>