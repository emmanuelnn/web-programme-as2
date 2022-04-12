<?php
require '../functions/loadTemplate.php';
require '../database.php';
require '../classes/DatabaseTable.php';
require '../Controllers/JokeController.php';
require '../Controllers/CategoryController.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
$categoriesTable = new DatabaseTable($pdo, 'category', 'id');

$controllers = []; 
$controllers['joke'] = new JokeController($jokesTable);
$controllers['category'] =  new CategoryController($categoriesTable);

$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
if ($route == '') {
        $page = $controllers['joke']->home();
}
else {
        list($controllerName, $functionName) = explode('/', $route);
        $controller = $controllers[$controllerName];
        $page = $controller->$functionName();

}

$output = loadTemplate('../templates/' . $page['template'], $page['variables']);
$title = $page['title'];
require  '../templates/layout.html.php';
