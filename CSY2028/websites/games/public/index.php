<ul>
	<li><a href="addplatform.php">Add Platform</a></li>
	<li><a href="addgame.php">Add Game</a></li>
</ul>

<h2>Select platform:</h2>
<ul>

<?php
    


$server = 'mysql';
$username = 'student';
$password = 'student';
//The name of the schema we created earlier in MySQL workbench
//If this schema does not exist you will get an error!
$schema = 'CSY2028';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);



	$stmt = $pdo->prepare('SELECT * FROM platforms');

	$stmt->execute();

	foreach ($stmt as $row) {
		echo '<li><a href="viewgames.php?platformId=' . $row['id'] . '">' . $row['name'] . '</a></li>';
		
	}
?>
</ul>
