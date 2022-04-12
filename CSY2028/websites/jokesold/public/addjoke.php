<?php

if (isset($_POST['joketext'])) {

	$pdo = new PDO('mysql:host=mysql;dbname=ijdb;charset=utf8', 'student', 'student');

	$date = new DateTime();

	$sql = 'INSERT INTO joke (joketext,jokedate) VALUES (:joketext, :jokedate)';

	$stmt = $pdo->prepare($sql);

	$values = [
				'joketext' => $_POST['joketext'],
				'jokedate' => $date->format('Y-m-d H:i:s')
			];

	$stmt->execute($values);

	header('location: jokes.php');



}
else {
	ob_start();
require  '../templates/addJoke.html.php';
	$output = ob_get_clean();

	$title = 'Add a new joke';

}

require  '../templates/layout.html.php';