<?php
$myTitle = 'Northampton News - View Articles';
require '../header.php';
?>




<?php



if (isset($_GET['categoryId']))  {



	$server = 'mysql';
	$username = 'student';
	$password = 'student';

	$schema = 'assignment1';
	
	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
	
	
		$categoryStmt = $pdo->prepare('SELECT * FROM assignment1.category WHERE categoryId = :categoryId');
	$articleStmt = $pdo->prepare('SELECT * FROM assignment1.article WHERE categoryId = :categoryId');

	$values = [
		'categoryId' => $_GET['categoryId']
	];

	$categoryStmt->execute($values);
	$articleStmt->execute($values);


	$category = $categoryStmt->fetch();

	echo '<h1>' . $category['name'] . '</h1>';

	echo '<ul>';
	foreach ($articleStmt as $article) {
		echo  '<h2>' . $article['title'] . '</h2>';
        echo  '<p>' . $article['content'] . '<p>';
        echo  '<p> Publish on ' . $article['publishDate'] . '<p>';

		
	}
	echo '</ul>';
}
?>




<?php
require '../footer.php';
?>


