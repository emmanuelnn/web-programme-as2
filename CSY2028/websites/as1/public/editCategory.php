<?php
$myTitle = 'Northampton News - Edit Category';
require '../header.php';
?>




<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);



if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE assignment1.category
						   SET name = :name , categoryId = :categoryId
						   WHERE categoryId = :categoryId');

	$values = [
		'name' => $_POST['name'],
		'categoryId' => $_POST['categoryId'],
	
	];

	$stmt->execute($values);
	echo '<h3>'. $_POST['name'] . ' category is edited' . '</h3>';
    echo '<ul><a href="adminCategories.php">Back to main category</a></ul>';
    echo '<ul>or</ul>';
    echo '<ul><a href="adminArticles.php">Mange article</a></ul>';


}
else if (isset($_GET['categoryId'])) {

	$CategoryStmt = $pdo->prepare('SELECT * FROM assignment1.category WHERE categoryId = :categoryId');

	$values = [
		'categoryId' => $_GET['categoryId']
	];

	$CategoryStmt->execute($values);

	$Category = $CategoryStmt->fetch();
?>
<form action="editCategory.php" method="POST">
	<input type="hidden" name="categoryId" value="<?php echo $Category['categoryId']; ?>"/>

	<label>Category name:</label>
	<input type="text" name="name"  value="<?php echo $Category['name']; ?>" />

	<?php

		$stmt = $pdo->prepare('SELECT * FROM assignment1.category');
		$stmt->execute();

		foreach ($stmt as $row) {
			if ($row['categoryId'] == $Category['categoryId']) {
				echo '<option value="' . $row['categoryId'] . '" selected="selected">' . '</option>';
			}
			else {
				echo '<option value="' . $row['categoryId'] . '">' . '</option>';
			}
		}

	?>
	</select>

	<input type="submit" name="submit" value="Edit" />
</form>
<?php
}
?>

<?php
require '../footer.php';
?>


