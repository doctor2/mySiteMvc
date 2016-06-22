<?php
function __autoload($className) 
{
	require_once ('/models/'.lcfirst($className).'.php');
}

class Route
{

	static function start()
	{
		$controllerName = 'articles'; 
		$actionName = 'index';
		$params = array();
		$url = strtolower(trim($_SERVER['REQUEST_URI']));
		if ($url == '/');
		else if (preg_match("/^\/(\w+)\/?$/", $url , $match))
			$controllerName = $match[1];
		else if (preg_match("/^\/(\w+)\/(\w+)\/?$/", $url, $match))
		{
			$controllerName = $match[1];
			$actionName = $match[2];
		}
		else if (preg_match("/^\/(\w+)\/page\/(\d+)\/?$/", $url, $match))
		{
			$controllerName = $match[1];
			$params['page'] =$match[2];
		}
		else if (preg_match("/^\/(\w+)\/(\w+)\/id\/(\d+)\/?$/", $url, $match))
		{
			$controllerName = $match[1];
			$actionName = $match[2];
			$params['id'] =$match[3];
		}
		else if (preg_match("/^\/(\w+)\/(\w+)\/page\/(\d+)\/?$/", $url, $match))
		{
			$controllerName = $match[1];
			$actionName = $match[2];
			$params['page'] =$match[3];
		}
		else Route::errorPage404();


		$controllerName = $controllerName.'Controller';
		$controllerPath = "./controllers/".$controllerName.'.php';
		if(file_exists($controllerPath)) include $controllerPath;
		else Route::errorPage404();
		
		$controllerName = ucfirst($controllerName);
		$controller = new $controllerName;

		if (!empty($params)) $controller->set('params',$params);
		if (method_exists($controller, $actionName))
			$controller->$actionName();
		else
			Route::errorPage404();	
	}

	static function messagePage($title, $message)
	{
		head($title);
		echo '<h1><label>'.$message.'</label></h1>
			<a href="/">Вернуться на главную</a>';
		footer();
		exit();
    }

	static function errorPage404()
	{
		head('ошибка');
		echo '<h1><label>HTTP/1.1 404 Not Found</label></h1>
			<a href="/">Вернуться на главную</a>';
		footer();
		exit();
    }
}
?>
