<?php
require '../loadTemplate.php';
require '../database.php';
require '../DatabaseTable.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

$joke = $jokesTable->find('id', 1);

$title = 'Internet Joke Database';
$output = loadTemplate('../templates/home.html.php', ['joke' => $joke[0]]);

require  '../templates/layout.html.php';