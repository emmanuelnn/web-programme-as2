<?php
session_start();
require '../../functions/loadTemplate.php';
require '../../database.php';
require '../../autoload.php';



$output = loadTemplate('../../templates/adminindex.html.php', [0]);

$title = 'Claires Cars - Admin';

require  '../../templates/layout.html.php';