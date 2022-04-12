<?php

require '../database.php';
require '../functions.php';
deleteJoke($pdo, $_POST['id']);
header('location: jokes.php');

   ?>