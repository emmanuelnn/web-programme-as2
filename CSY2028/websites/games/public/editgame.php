<?php
$server = 'mysql';
$username = 'student';
$password = 'student';
//The name of the schema we created earlier in MySQL workbench
//If this schema does not exist you will get an error!
$schema = 'CSY2028';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);



if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE game
						   SET name = :name , platformID = :platformID
						   WHERE id = :id');

	$values = [
		'name' => $_POST['name'],
		'platformID' => $_POST['platformID'],
		'id' => $_POST['id']
	];

	$stmt->execute($values);
	echo 'Game ' . $_POST['name'] . ' edited';
}
//If the form has not been submitted, check that a game has been selected to be edited e.g. editgame.php?id=3
else if (isset($_GET['id'])) {

	$gameStmt = $pdo->prepare('SELECT * FROM game WHERE id = :id');

	$values = [
		'id' => $_GET['id']
	];

	$gameStmt->execute($values);

	$game = $gameStmt->fetch();
?>
<form action="editgame.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $game['id']; ?>"/>

	<label>Game name:</label>
	<input type="text" name="name"  value="<?php echo $game['name']; ?>" />
	<label>Select platform:</label>
	<select name="platformID">
	<?php

		$stmt = $pdo->prepare('SELECT * FROM platforms');
		$stmt->execute();

		foreach ($stmt as $row) {
			if ($row['id'] == $game['platformID']) {
				echo '<option value="' . $row['id'] . '" selected="selected">' . $row['name'] . '</option>';
			}
			else {
				echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
			}
		}

	?>
	</select>

	<input type="submit" name="submit" value="Add" />
</form>
<?php
}
?>
