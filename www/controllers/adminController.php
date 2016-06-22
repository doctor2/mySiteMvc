<?php
class AdminController extends Controller
{
	private $path = 'admin/';
	
	function __construct()
	{
		parent::__construct();
		self::checkAccess();
		$this->model = new ArticleModel();	
	}
	
	private function checkAccess()
	{
		if (@$_SESSION['USER_ROLE']!=3) Route:: messagePage('Ошибка', 'У вас недостаточно прав!!!');
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
		$this->view->set('records', $records);
		$this->view->generate('Админка',$this->path.'index.php');
	}

	function editArticle()
	{
		if (@$_POST['enter']) {
			$this->model->editRecord($this->params['id'] ,$_POST['title'], $_POST['date'], $_POST['content']);
			exit(header("Location: /admin"));
		}
		$record = $this->model->getRecord($this->params['id']);
		if (empty($record)) Route::errorPage404();
		$this->view->set('record', $record);
		$this->view->generate('Редактирование', $this->path.'articleEdit.php');

	}

	function createArticle()
	{
		if (@$_POST['enter']) {
			$this->model->addRecord($_POST['title'], $_POST['date'], $_POST['content']);
			header("Location: /admin");
			exit();
		}
		$this->view->generate('Добавить запись', $this->path.'articleCreate.php');
	}

	function deleteArticle()
	{
		if ( $this->params['id']) {
			$this->model->deleteRecord($this->params['id']);
			header("Location: /admin");
			exit();
		}
		
	}
}
?>
