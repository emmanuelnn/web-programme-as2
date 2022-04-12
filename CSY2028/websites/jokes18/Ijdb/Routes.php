<?php
namespace Ijdb;

class Routes implements \CSY2028\Routes {
	public function getController($name) {
		require '../database.php';

		$authorsTable = new \CSY2028\DatabaseTable($pdo. 'author', 'id');

		$jokesTable = new \CSY2028\DatabaseTable($pdo, 'joke', 'id', '\Ijdb\Entity\Joke', [
			$authorsTable
		]);

		
		$categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');

		$controllers = [];

		$controllers['joke'] = new \Ijdb\Controllers\Joke($jokesTable);

		$controllers['category'] = new \Ijdb\Controllers\Category($categoriesTable);

		return $controllers[$name];
	}

	public function getDefaultRoute() {
		return 'joke/home';
	}

	public function checkLogin($route) {
		
		$loginRoutes = [];

		$loginRoutes['/joke/edit'] =  true;
		$loginRoutes['/category/edit'] = true;

		$requiresLogin = $loginRoutes[$route] ?? false;

		if ($requiresLogin && !isset($_SESSION['loggedin'])) {
			header('location: /user/login');
			exit();
		}
	}
}