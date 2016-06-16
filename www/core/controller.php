<?php
function __autoload($className) 
{
	require_once ('/models/'.lcfirst($className).'.php');
}
class Controller {
	
	public $model;
	public $view;
	public $link;
	
	function __construct()
	{	
		
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
}
