<?php
require '../functions/loadTemplate.php';
require '../database.php';
require '../autoload.php';

$carsTable = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
$manufacturersTable = new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id');
$newsTable = new \CSY2028\DatabaseTable($pdo, 'news', 'id');
$enquiresTable = new \CSY2028\DatabaseTable($pdo, 'enquires', 'id');


$controllers = [];
$controllers['cars'] = new \tables\Controllers\cars($carsTable, $manufacturersTable);
$controllers['manufacturers'] = new \tables\Controllers\manufacturers($manufacturersTable);
$controllers['news'] = new \tables\Controllers\news($newsTable);
$controllers['enquires'] = new \tables\Controllers\enquires($enquiresTable);


$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');

if ($route == '') {
        $page = $controllers['cars']->home();
        $page = $controllers['news']->home();
}
else {
	  list($controllerName, $functionName) = explode('/', $route);
      $controller = $controllers[$controllerName];
      $page = $controller->$functionName();
}

$output = loadTemplate('../templates/' . $page['template'], $page['variables']);

$title = $page['title'];

require  '../templates/layout.html.php';