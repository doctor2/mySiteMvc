<?php

class RatesController extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->model = new RateModel();
	}

	function article()
	{
		if (!empty($this->params['id']) && !empty($_SESSION['USER_ID'])) {
				$this->model->addLike($this->params['id'], $_SESSION['USER_ID']);	
		}	
		$back = empty($_SERVER['HTTP_REFERER'])?"/": $_SERVER['HTTP_REFERER'];
		exit(header('location: '.$back));
	}
}
?>