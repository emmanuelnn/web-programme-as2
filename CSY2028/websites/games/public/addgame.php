<?php



$server = 'mysql';
$username = 'student';
$password = 'student';
//The name of the schema we created earlier in MySQL workbench
//If this schema does not exist you will get an error!
$schema = 'CSY2028';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);



if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('INSERT INTO  game (name, platformId ) VALUES (:name, :platformId)');

	$values = [
		'name' => $_POST['name'],
		'platformId' => $_POST['platformId']
	];

	$stmt->execute($values);
	echo 'Game ' . $_POST['name'] . ' added';
}
else {
?>
<form action="addgame.php" method="POST">
	<label>Game name:</label>
	<input type="text" name="name" />
	<label>Select platform:</label>
	<select name="platformId">
	<?php

		$stmt = $pdo->prepare('SELECT * FROM platforms');
		$stmt->execute();

		foreach ($stmt as $row) {
			echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
		}

	?>
	</select>

	<input type="submit" name="submit" value="Add" />
</form>
<?php
}
?>
