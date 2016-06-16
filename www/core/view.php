<?php

class View
{

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

	function generate($title, $content)
	{
		include './views/template.php';
	}

	function gen()
	{
		include './views/template.php';
	}


	// public function __named($method, array $args = array())
 //  {
 //    $reflection = new ReflectionMethod($this, $method);

 //    $pass = array();
 //    foreach($reflection->getParameters() as $param)
 //    {
 //       @var $param ReflectionParameter 
 //      if(isset($args[$param->getName()]))
 //      {
 //        $pass[] = $args[$param->getName()];
 //      }
 //      else
 //      {
 //        $pass[] = $param->getDefaultValue();
 //      }
 //    }

  //   return $reflection->invokeArgs($this, $pass);
  // }
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
}
