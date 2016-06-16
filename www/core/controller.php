<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{	
		self::checkAuthoriz();
		$this->view = new View();
	}
	
	//При создании объекта класса имя передается в эту функцию
	// function __autoload($className) 
	// {
	// 	require_once ('/models/'.lcfirst($className).'.php');
	// }

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

	function checkAuthoriz()
    {
    	session_start();
		if (@$_SESSION['USER_LOGIN_IN'] != 1 && !empty($_COOKIE['user'])) {
			$model = new AccountModel();
			$result = $model->getUserByPassword($_COOKIE['user']);
			$_SESSION['USER_LOGIN'] = $result['login'];
			$_SESSION['USER_ID'] = $result['id'];
			$_SESSION['USER_NAME'] = $result['name'];
			$_SESSION['USER_EMAIL'] = $result['email'];
			$_SESSION['USER_LOGIN_IN'] = 1;
		}
    }
}
