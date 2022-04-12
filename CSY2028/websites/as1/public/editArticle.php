<?php
$myTitle = 'Northampton News - Edit Article';
require '../header.php';
?>


<?php
$server = 'mysql';
$username = 'student';
$password = 'student';

$schema = 'assignment1';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);



if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE assignment1.article
						   SET articleid = :articleid, title = :title, content = :content, categoryId = :categoryId
						   WHERE articleid = :articleid');

	$values = [
		'articleid' => $_POST['articleid'],
		'title' => $_POST['title'],
		'content' => $_POST['content'],
        'categoryId' => $_POST['categoryId'],
	];

	$stmt->execute($values);
	echo $_POST['title'] . ' Article is edited';
    echo '<ul><a href="adminArticles.php">Back to Articles</a></ul>';
    echo '<ul>or</ul>';
    echo '<ul><a href="adminCategories.php">Mange Category</a></ul>';
}
else if (isset($_GET['articleid'])) {

	$gameStmt = $pdo->prepare('SELECT * FROM assignment1.article WHERE articleid = :articleid');

	$values = [
		'articleid' => $_GET['articleid']
	];

	$gameStmt->execute($values);

	$game = $gameStmt->fetch();
?>

<form action="editArticle.php" method="POST">
	<input type="hidden" name="articleid" value="<?php echo $game['articleid']; ?>"/>

	<label>Title:</label>
	<input type="text" name="title"  value="<?php echo $game['title']; ?>" />
    <label>Content:</label>
    <textarea name="content"> <?php echo $game['content']; ?></textarea>
	<label>Category:</label>
	<select name="categoryId">
	<?php

		$stmt = $pdo->prepare('SELECT * FROM assignment1.category');
		$stmt->execute();

		foreach ($stmt as $row) {
			if ($row['categoryId'] == $game['categoryId']) {
				echo '<option value="' . $row['categoryId'] . '" selected="selected">' . $row['name'] . '</option>';
			}
			else {
				echo '<option value="' . $row['categoryId'] . '">' . $row['name'] . '</option>';
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
