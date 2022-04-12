<?php
ob_start();
require '../templates/index.html.php';
$output = ob_get_clean();
$title = 'Internet Joke Database';
require  '../templates/layout.html.php';

