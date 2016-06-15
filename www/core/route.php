<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

if ($_SERVER['REQUEST_URI'] == '/') {
	$page = 'index'; $module = 'index';
} else {
		$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$URL_Parts = explode('/', trim($URL_Path, ' /'));
		$page = array_shift($URL_Parts);
		$module = array_shift($URL_Parts);
		$params = array();
		if (!empty($module)  and count($URL_Parts) == 1)
			$params[$module] = $URL_Parts[0];
		if (!empty($module)  and count($URL_Parts) == 2) {
			$params[$URL_Parts[0]] = $URL_Parts[1];
	}
}


if ($page == 'index') include("views/articles.php");
else if ($page == 'articles') include("views/articles.php");
else if ($page == 'article' and @$params['id']) include("/controllers/articleController.php");
else if ($page == 'admin') include("/controllers/adminController.php");
else if ($page == 'account') include("/controllers/accountController.php");


	static function start()
	{
		if ($_SERVER['REQUEST_URI'] == '/') 
		{
			$controllerName = 'article'; 
			$actionName = 'index';
		} else 
		{
			$routes = explode('/',  $_SERVER['REQUEST_URI']);
			if ( !empty($routes[1]) )
				$controllerName = $routes[1];
			else if (!empty($routes[2]))
				$actionName = $routes[2];
			else if (count($routes)==5)
				$params[$routes[3]] = $routes[4]; 
		}	

		// добавляем префиксы
		$controllerName = $controllerName.'Controller';
		$actionName = $actionName;

		// подцепляем файл с классом контроллера
		$controllerFile = strtolower($controllerName).'.php';
		$controllerPath = "/controllers/".$controllerFile;
		if(file_exists($controllerPath))
		{
			include "/controllers/".$controllerFile;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controllerName;
		$action = $actionName;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        exit(header('HTTP/1.1 404 Not Found'));
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
