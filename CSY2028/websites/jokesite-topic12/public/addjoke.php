<?php

require '../loadTemplate.php';

if (isset($_POST['joketext'])) {

	require '../database.php';


	$date = new DateTime();

	$sql = 'INSERT INTO `joke` (joketext,jokedate) VALUES (:joketext, :jokedate)';

	$stmt = $pdo->prepare($sql);

	$stmt->execute(['joketext' => $_POST['joketext'], 'jokedate' => $date->format('Y-m-d H:i:s')]);

	header('location: jokes.php');



}
else {
	$output = loadTemplate('../templates/addjoke.html.php', []);

	$title = 'Add a new joke';

}

require  '../templates/layout.html.php';