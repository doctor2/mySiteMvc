<?php

class Controller {
	
	public $model;
	public $view;
	public $link;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	function index()
	{
		// todo	
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
