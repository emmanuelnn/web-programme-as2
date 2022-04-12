<?php
namespace tables\Controllers;
class cars {
	private $carsTable;
	private $manufacturersTable;

	public function __construct($carsTable, $manufacturersTable) {
		$this->carsTable = $carsTable;
		$this->manufacturersTable = $manufacturersTable;
	}

	public function list() {

		$cars = $this->carsTable->findAll();
		$manufacturers = $this->manufacturersTable->findAll();

		return ['template' => 'list.html.php', 
				'title' => 'Cars List',
				'variables' => [
						'cars' => $cars,
						'manufacturersTable' => $this->manufacturersTable,
						'manufacturers' => $manufacturers
						]
				];
	}

	public function delete() {
		$this->carsTable->delete($_POST['id']);

		header('location: /cars/listall');
	}

	public function home() {
		$cars = $this->carsTable->find('id', 1);

		return [
			'template' => 'home.html.php',
			'variables' => ['cars' => $cars[0]],
			'title' => 'Claires Cars - Home'
		];

	}

	public function edit() {
		if (isset($_POST['submit'])) {
			$cars=$_POST['cars'];

			if($cars['id']==''){
				$cars['id'] = null;
			}

			$this->carsTable->save($cars);

			if ($_FILES['image']['error'] == 0) {
				$fileName = $this->carsTable->lastInsertId() . '.jpg';
				move_uploaded_file($_FILES['image']['tmp_name'], 'images/cars/' . $fileName);
			}

			header('location: /cars/listall');
		}
		else {
			if  (isset($_GET['id'])) {
				$result = $this->carsTable->find('id', $_GET['id']);
				$cars = $result[0];
			}
			else  {
				$cars = false;
			}
			$manufacturers = $this->manufacturersTable->findAll();


			return [
				'template' => 'editcar.html.php',
				'title' => 'Edit cars',
				'variables' => ['cars' => $cars,
								'manufacturersTable' => $this->manufacturersTable,
								'manufacturers' => $manufacturers]
			];
		}
	}
	public function about() {


		return ['template' => 'about.html.php', 
				'title' => 'Claires Cars - About',
				'variables' => [
					]
				];
	}

	public function careers() {


		return ['template' => 'careers.html.php', 
				'title' => 'Claires Cars - Careers',
				'variables' => [
					]
				];
	}


	public function car_filter() {

		$cars = $this->carsTable->find('manufacturerid', $_GET['id']);
		$manufacturers = $this->manufacturersTable->findAll();

		return ['template' => 'list.html.php', 
				'title' => 'Manufacturers list filter',
				'variables' => [
						'cars' => $cars,
						'manufacturersTable' => $this->manufacturersTable,
						'manufacturers' => $manufacturers
						]
				];
	}

	public function listAll() {

		$cars = $this->carsTable->findAll();
		$manufacturers = $this->manufacturersTable->findAll();

		return ['template' => 'carlist.html.php', 
				'title' => 'Cars List',
				'variables' => [
						'cars' => $cars,
						'manufacturersTable' => $this->manufacturersTable,
						'manufacturers' => $manufacturers
						]
				];
	}
	
	
}

