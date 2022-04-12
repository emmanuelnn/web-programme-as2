<?php
require '../loadTemplate.php';

require '../database.php';

require '../DatabaseTable.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

$jokes = $jokesTable->findAll();

$title = 'Joke list';

$output = loadTemplate('../templates/list.html.php', ['jokes' => $jokes]);



require  '../templates/layout.html.php';