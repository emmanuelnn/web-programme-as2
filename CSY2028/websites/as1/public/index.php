<?php
$myTitle = 'Northampton News - Home';
require '../header.php';
?>

<h1>Latest Articles</h1>
 

<?php


$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);



	$stmt = $pdo->prepare('SELECT * FROM assignment1.article ORDER BY publishDate DESC LIMIT 10');

	$stmt->execute();

	foreach ($stmt as $row) {

		echo '<li><a href="Article.php?articleid=' . $row['articleid'] . '">' . 'View ' . $row['title'] . '</a></li>';
		echo '<p>'. $row['publishDate'] . '</p>' ;
	}

?>





<?php
require '../footer.php';
?>
