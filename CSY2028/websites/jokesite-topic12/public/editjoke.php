<?php

require '../loadTemplate.php';
require '../database.php';
require '../functions.php';

if (isset($_POST['joketext'])) {

	$joke = ['joketext' => $_POST['joketext']];
	updateJoke($pdo, $joke, 'id', $_GET['id']);
	header('location: jokes.php');


}
else {

	$joke = find($pdo, 'joke', 'id', $_GET['id']);

	$output = loadTemplate('../templates/editjoke.html.php', ['joke' => $joke[0]]);

	$title = 'Edit joke';

}

require  '../templates/layout.html.php';