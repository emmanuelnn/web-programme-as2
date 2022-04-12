<?php
namespace tables\Controllers;
class news {
	private $newsTable;

	public function __construct($newsTable) {
		$this->newsTable = $newsTable;
	}



	public function list() {

		$news = $this->newsTable->findAll();

		return ['template' => 'newslist.html.php', 
				'title' => 'News List',
				'variables' => [
						'news' => $news
					]
				];
	}

	public function home() {
		$news = $this->newsTable->findall();

		return [
			'template' => 'home.html.php',
			'variables' => ['news' => $news],
			'title' => 'Claires news - Home'
		];


	}


	public function delete() {
		$this->newsTable->delete($_POST['id']);

		header('location: /news/list');
	}


	public function edit() {
		if (isset($_POST['news'])) {
			
			$date = new \DateTime();
			
			$news = $_POST['news'];
			$news['newsdate'] = $date->format('Y-m-d H:i:s');

			$this->newsTable->save($news);
            

			header('location: /news/list');
		}
		else {
			if  (isset($_GET['id'])) {
				$result = $this->newsTable->find('id', $_GET['id']);
				$news = $result[0];
			}
			else  {
				$news = false;
			}

			return [
				'template' => 'editnews.html.php',
				'variables' => ['news' => $news],
				'title' => 'Edit news'
			];
		}
	}
}