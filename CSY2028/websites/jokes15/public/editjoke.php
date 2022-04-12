<?php

require '../loadTemplate.php';

require '../database.php';

require '../DatabaseTable.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

if (isset($_POST['joke'])) {
	
	$date = new DateTime();
	
	$joke = $_POST['joke'];
	$joke['jokedate'] = $date->format('Y-m-d H:i:s');

	$jokesTable->save($joke);

	header('location: jokes.php');
}
else {
	if  (isset($_GET['id'])) {
		$result = $jokesTable->find('id', $_GET['id']);
		$joke = $result[0];
	}
	else  {
		$joke = false;
	}

	$output = loadTemplate('../templates/editjoke.html.php', ['joke' => $joke]);
	$title = 'Edit joke';
}

require  '../templates/layout.html.php';