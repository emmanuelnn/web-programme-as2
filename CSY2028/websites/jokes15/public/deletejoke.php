<?php

require '../database.php';
require '../DatabaseTable.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

$jokesTable->delete($_POST['id']);

header('location: jokes.php');