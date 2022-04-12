<?php
//Only display games if a platform has been selected e.g. viewgames.php?platformId=1

if (isset($_GET['platformId']))  {



	$server = 'mysql';
	$username = 'student';
	$password = 'student';
	//The name of the schema we created earlier in MySQL workbench
	//If this schema does not exist you will get an error!
	$schema = 'CSY2028';
	
	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
	
	
		$platformStmt = $pdo->prepare('SELECT * FROM platforms WHERE id = :id');
	$gamesStmt = $pdo->prepare('SELECT * FROM game WHERE platformId = :id');

	$values = [
		'id' => $_GET['platformId']
	];

	$platformStmt->execute($values);
	$gamesStmt->execute($values);


	$platform = $platformStmt->fetch();

	echo '<h1>' . $platform['name'] . ' games</h1>';

	echo '<ul>';
	foreach ($gamesStmt as $game) {
		echo '<li><a href="editgame.php?id=' . $game['id'] . '">' . $game['name'] . '</a></li>';
		
	}
	echo '</ul>';
}
?>
