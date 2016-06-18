<?php

class SearchController extends Controller
{
	private $path = 'article/';

	function __construct()
	{
		parent::__construct();
		$this->model = new ArticleModel();
	}

	function articles()
	{
		if (!empty($_POST['search']) || !empty($_SESSION['SEARCH'])) {
			$searchLine = empty($_POST['text'])? $_SESSION['SEARCH'] : $_POST['text'];
			if (!empty($this->params['page'])){
				$records = $this->model->searchRecords($searchLine);
				$this->view->set('pageNumber', $this->params['page']);
				$this->view->set('records', array_slice($records, ((int)$this->params['page']-1)*NUMBER_OF_ARTICLE, NUMBER_OF_ARTICLE));
			}
			else{
				$records = $this->model->searchRecords($searchLine);
				$this->view->set('pageNumber', 1);
				$this->view->set('records', array_slice($records, 0, NUMBER_OF_ARTICLE));
			}
			$_SESSION['SEARCH'] = $searchLine;
		}	
		else Route::errorPage404();
		$this->view->set('number', count($records));
		$this->view->set('path', "/search/articles/page/");
		$this->view->generate('Главная',$this->path.'articles.php');
	}
}
?>