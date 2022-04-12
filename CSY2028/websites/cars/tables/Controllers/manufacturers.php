<?php
namespace tables\Controllers;
class manufacturers {
	private $manufacturersTable;

	public function __construct($manufacturersTable) {
		$this->manufacturersTable = $manufacturersTable;
	}

	public function list() {

		$manufacturers = $this->manufacturersTable->findAll();

		return ['template' => 'manufacturerslist.html.php', 
				'title' => 'Manufacturers List',
				'variables' => [
						'manufacturers' => $manufacturers
					]
				];
	}

	public function home() {
		$manufacturers = $this->manufacturersTable->find('id', 1);

		return [
			'template' => 'manufacturerslist.html.php',
			'variables' => ['manufacturers' => $manufacturers[0]],
			'title' => 'Claires Manufacturers - Home'
		];


	}


	public function delete() {
		$this->manufacturersTable->delete($_POST['id']);

		header('location: /manufacturers/list');
	}


	public function edit() {
		if (isset($_POST['manufacturers'])) {

			$this->manufacturersTable->save($_POST['manufacturers']);

			header('location: /manufacturers/list');
		}
		else {
			if  (isset($_GET['id'])) {
				$result = $this->manufacturersTable->find('id', $_GET['id']);
				$manufacturer = $result[0];
			}
			else  {
				$manufacturer = false;
			}

			return [
				'template' => 'editmanufacturer.html.php',
				'variables' => ['manufacturers' => $manufacturer],
				'title' => 'Edit Manufacturers'
			];
		}
	}
}
