<?php
$myTitle = 'Northampton News - Add Category';
require '../header.php';
?>

<?php
$server = 'mysql';
$username = 'student';
$password = 'student';


$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

if (isset($_SESSION['loggedin'])){
	$stmt = $pdo->prepare('SELECT * FROM assignment1.register WHERE registerid = :registerid');

	$values = ['registerid' => $_SESSION['loggedin']];
	$stmt->execute($values);
	


if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('INSERT INTO assignment1.category(name)
						   VALUES (:name)');


	$values = [
	
		'name' => $_POST['name'],
	];
	
	$stmt->execute($values);

	echo 'Record Added';

	echo '<p><a href="adminCategories.php">Back to list</a>';
}
else{
?>

	

	<form action="addCategory.php" method="post">

		<label>Name</label>
		<input type="text"  name="name" />

		<input type="submit" value="submit" name="submit" />
	</form>
	




<?php
}}
else {
	echo '<title> add category</title>' ;
	echo '<h2> You need to log in <a href="login.php">log in</a> </h2>' ;
}

require '../footer.php';
?>
