<?php

error_reporting(E_ALL);//выводит все допущенные ошибки
// подключаем файлы ядра
require_once '/core/model.php';
require_once '/core/view.php';
require_once '/core/controller.php';
require_once '/core/route.php';
require_once("/database.php");
require_once('/functions.php');
require_once("/settings.php");
Route::start(); // запускаем маршрутизатор

?>
