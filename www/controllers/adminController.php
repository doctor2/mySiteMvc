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
		if (empty($_SESSION['USER_LOGIN_IN']) or $_SESSION['USER_LOGIN_IN']!=666){
			head('Ошибка');
			echo '<h1><label>У вас недостаточно прав!!!</label></h1>
				<a href="/">Вернуться на главную</a>';
			footer();
			exit();
		}
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
			header("Location: /admin");
			exit();
		}
		$record = $this->model->getRecord($this->params['id']);
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
