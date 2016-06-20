<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{	
		self::checkAuthoriz();
		$this->view = new View();
	}

	private function checkAuthoriz()
    {
    	session_start();
		if (empty($_SESSION['USER_LOGIN'])  && !empty($_COOKIE['user'])) {
			$model = new AccountModel();
			$result = $model->getUserByPassword($_COOKIE['user']);
			addUserToSession($result);
		}
    }

	private $data = array(); // Данные для вывода

	public function set($name, $value) 
	{
		$this->data[$name] = $value;
	}
 
	public function __get($name) 
	{
		if (isset($this->data[$name])) return $this->data[$name];
		return "";
	}
	
}
