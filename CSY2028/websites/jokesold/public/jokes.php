<?php

$pdo = new PDO('mysql:host=mysql;dbname=ijdb;charset=utf8', 'student', 'student',);

$stmt = $pdo->prepare('SELECT * FROM joke');
$stmt->execute();

$title = 'Joke list';

ob_start();
require  '../templates/jokes.html.php';

$output = ob_get_clean();
require  '../templates/layout.html.php';