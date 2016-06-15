<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	static function start()
	{
		$controllerName = 'article'; 
		$actionName = 'index';
		$params = array();
		$url = strtolower(trim($_SERVER['REQUEST_URI']));

		if (preg_match("/^\/(\w+)\/(\w+)\/id\/(\d+)\/?$/", $url, $match))
		{
			$controllerName = $match[1];
			$actionName = $match[2];
			$params['id'] =$match[3];
		}
		else if (preg_match("/^\/(\w+)\/page\/(\d+)\/?$/", $url, $match))
		{
			$controllerName = $match[1];
			//$actionName = $match[2];
			$params['page'] =$match[2];
		}
		else if (preg_match("/^\/(\w+)\/(id)\/(\d+)\/?$/", $url, $match))
		{
			$controllerName = $match[1];
			$actionName = $match[2];
			$params['id'] =$match[3];
		}
		else if (preg_match("/^\/(\w+)\/(\w+)\/?$/", $url, $match))
		{
			$controllerName = $match[1];
			$actionName = $match[2];
		}
		else if (preg_match("/^\/(\w+)\/?$/", $url , $match))
			$controllerName = $match[1];
		else if ($url == '/') ;
		else Route::ErrorPage404();
		// echo '<pre>';
		// print_r($match);

		$controllerName = $controllerName.'Controller';

		$controllerPath = "./controllers/".$controllerName.'.php';
		if(file_exists($controllerPath)) include $controllerPath;
		else Route::ErrorPage404();
		
		$controllerName = ucfirst($controllerName);
		$controller = new $controllerName;

		if (!empty($params)) $controller->set('params',$params);

		if(method_exists($controller, $actionName))
			$controller->$actionName();
		else
			Route::ErrorPage404();
	
	}

	static function ErrorPage404()
	{
		head('Ошибка');
		echo '<h1><label>HTTP/1.1 404 Not Found</label></h1>
			<a href="/">Вернуться на главную</a>';
		footer();
		exit();
		$view = new View();
		$view->set();
		$view->set('title', 'Error');
		// $this->view->set('content', $this->path.'articleEdit.php');
        // $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        $view->generate();
        //exit(header('HTTP/1.1 404 Not Found'));
		// header("Status: 404 Not Found");
		// header('Location:'.$host.'404');
    }
    
}
