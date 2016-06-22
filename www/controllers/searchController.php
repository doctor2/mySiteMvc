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
			$records = $this->model->searchRecords($searchLine);
			if (empty($records)) Route:: messagePage('Поиск', 'Записей не найдено');
			$_SESSION['SEARCH'] = $searchLine;
		}	
		else Route::errorPage404();

		if (empty($this->params['page'])){
			$this->view->set('pageNumber', 1);
			$this->view->set('records', array_slice($records, 0, NUMBER_OF_ARTICLES));
		}
		else{
			$this->view->set('pageNumber', $this->params['page']);
			$this->view->set('records', array_slice($records, ((int)$this->params['page']-1)*NUMBER_OF_ARTICLES, NUMBER_OF_ARTICLES));
		}
		$this->view->set('numberOfRecords', count($records));
		$this->view->set('path', "/search/articles/page/");
		$this->view->generate('Страница поиск',$this->path.'articles.php');
	}
}
?>